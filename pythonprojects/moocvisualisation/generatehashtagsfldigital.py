import json
from pymongo import MongoClient
import requests
from urllib import urlencode
import time
import re

#Mongodb----------------------------------------------------------------
client = MongoClient('localhost', 27017)
db = client['tweets']
collection = db['tweets']

#-----------------------------------------------------------------------

reses = collection.find({"tag": "fldigital"})

hashtagsDataset = {};
procHashtagsDataset = [];


for res in reses:
	hashtags = re.findall(r"#(\w+)", res['text'])
	for hashtag in hashtags:
		hashtag = hashtag.lower()
		
		if(not hashtag in hashtagsDataset):
			hashtagsDataset[hashtag] = {}
		if(not res['user'] in hashtagsDataset[hashtag]):
			print res['user'][1].decode('unicode-escape')
		        hashtagsDataset[hashtag][res['user']] = {"count": 1, "user_id": res['user'].decode('unicode-escape'), "user_name": res['user'].decode('unicode-escape')}
		else:
			hashtagsDataset[hashtag][res['user']]['count'] += 1


for hashtag in hashtagsDataset:
	userList = []
	for user in hashtagsDataset[hashtag]:
		userList.append(hashtagsDataset[hashtag][user])
	procHashtagsDataset.append({'users': userList, 'hashtag': hashtag.decode('unicode-escape')})



with open("data/fldigitalhashtags.json", "w") as outfile:
    json.dump(procHashtagsDataset, outfile, ensure_ascii=False)

print hashtagsDataset
	

