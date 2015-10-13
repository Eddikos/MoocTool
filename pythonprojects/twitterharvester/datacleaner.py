import json
from pymongo import MongoClient
import requests
from urllib import urlencode
import time

#Mongodb----------------------------------------------------------------
client = MongoClient('localhost', 27017)
db = client['tweets']
collection = db['mooc']
dest = db['tweets']

#Open config------------------------------------------------------------
done = False
tweets = collection.find()

for tweet in tweets:
	time.sleep(0.1)	
	if("user" in tweet and 'location' in tweet['user']):
		try:
			res = requests.get("https://maps.googleapis.com/maps/api/geocode/json?address=" + urlencode({"temp": tweet['user']['location']}))
		except Exception as inst:
			print inst
			continue

		geoLocation = json.loads(res.content);
		location = ''
		if('results' in geoLocation and len(geoLocation['results']) > 0 and 'address_components' in geoLocation['results'][0]):
			for entry in geoLocation['results'][0]['address_components']:
				if('types' in entry and 'country' in entry['types'] and 'short_name' in entry):
					location = entry['short_name']
			
			record = {'tid': tweet['id'], 'user': tweet['user']['name'], 'text': tweet['text'], 'imageUrl': tweet['user']['profile_image_url'], 'location': location, 'tag': 'mooc', 'date': tweet['created_at'], "retweet_count": None, "entities": None}
			collection.update({'tid': record['tid']}, record, upsert= True)
			print record
		else:
			print 'NO GEOLOCATION FOUND:\n'
			print geoLocation['results']
			print '\n-------------------------------\n'
			print tweet['user']['location']

			if(geoLocation["status"] == "OVER_QUERY_LIMIT"):
				done = True
				break
	else:
		print 'NO LOCATION FOUND:\n'
		print tweet
