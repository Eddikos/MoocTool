from twython import Twython
import json
from pymongo import MongoClient
import requests
from urllib import urlencode
import time

TWITTER_APP_KEY = 'W1yDuapyhEkL00YDGuKMyesBr' #supply the appropriate value
TWITTER_APP_KEY_SECRET = 'nMnpgjDhgo99FAD66ZF3H7P0PKleUjJB4ztC6ZJX2fDyBIjnIR' 
TWITTER_ACCESS_TOKEN = '1170310531-SkC69xX6YBHXyyfUB4KYen3aVqcOZmAbv9fXXMh'
TWITTER_ACCESS_TOKEN_SECRET = 'UivRG4Uq3xm7NBq7WfuPsBwbjrXZzkPHGyEyUYE5kn7o3'

t = Twython(app_key=TWITTER_APP_KEY, 
            app_secret=TWITTER_APP_KEY_SECRET, 
            oauth_token=TWITTER_ACCESS_TOKEN, 
            oauth_token_secret=TWITTER_ACCESS_TOKEN_SECRET)

#Mongodb----------------------------------------------------------------
client = MongoClient('localhost', 27017)
db = client['tweets']
collection = db['tweets']

#Open config------------------------------------------------------------
jsonText = open('config.json')
jsonObject = json.load(jsonText)
#-----------------------------------------------------------------------
done = False

for index, tag in enumerate(jsonObject['hashtags']):
	if(done):
		break

	search = t.search(q=tag,  #Query here
                  count=jsonObject['countPerPage'],
		  since_id=jsonObject['since_id'][index])

	tweets = search['statuses']
	
	print 'Number of tweets for tag ' + tag + ': ' + str(len(tweets)) + '\n'

	for tweet in tweets:
		time.sleep(0.1)	
		if('location' in tweet['user']):
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
			
				record = {'tid': tweet['id_str'], 'user_id': tweet['user']['id'], 'user': tweet['user']['name'], 'text': tweet['text'], 'imageUrl': tweet['user']['profile_image_url'], 'location': location, 'tag': tag, 'date': tweet['created_at'], "retweet_count": tweet["retweet_count"], "entities": tweet["entities"]}
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
	if(len(tweets) > 0):
		jsonObject['since_id'][index] = tweets[0]['id_str']

with open("config.json", "w") as outfile:
    json.dump(jsonObject, outfile)

