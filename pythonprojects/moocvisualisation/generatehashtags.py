import json
from pymongo import MongoClient
import requests
from urllib import urlencode
import time
import re

#Mongodb----------------------------------------------------------------
client = MongoClient('localhost', 27017)
db = client['tweets']
collection = db['flwebsci']

#-----------------------------------------------------------------------

reses = collection.find({})

hashtagsDataset = {};
procHashtagsDataset = [];


for res in reses:
	hashtags = re.findall(r"#(\w+)", res['tweetText'])
	for hashtag in hashtags:
		hashtag = hashtag.lower()
		if(not hashtag in hashtagsDataset):
			hashtagsDataset[hashtag] = {}
		if(not res['twitterUserID'] in hashtagsDataset[hashtag]):
		        hashtagsDataset[hashtag][res['twitterUserID']] = {"count": 1, "user_id": res['twitterUserID'], "user_name": res['twitterUsername']}
		else:
			hashtagsDataset[hashtag][res['twitterUserID']]['count'] += 1


for hashtag in hashtagsDataset:
	userList = []
	for user in hashtagsDataset[hashtag]:
		userList.append(hashtagsDataset[hashtag][user])
	procHashtagsDataset.append({'users': userList, 'hashtag': hashtag})



with open("data/flwebscihashtags.json", "w") as outfile:
    json.dump(procHashtagsDataset, outfile)

print hashtagsDataset
	

