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
	if(not res["location"] in hashtagsDataset):
		hashtagsDataset[res["location"]] = {"country": res["location"], "count": 1, "tweets": [{"text": res["text"], "username": res["user"], "image_url": res["imageUrl"]}]}
	else:
		hashtagsDataset[res["location"]]["count"] += 1
		if(len(hashtagsDataset[res["location"]]["tweets"]) < 5):
			hashtagsDataset[res["location"]]["tweets"].append({"text": res["text"], "username": res["user"], "image_url": res["imageUrl"]})

print hashtagsDataset

for entry in hashtagsDataset:
	procHashtagsDataset.append(hashtagsDataset[entry])



with open("data/map.json", "w") as outfile:
    json.dump(procHashtagsDataset, outfile)

print hashtagsDataset
	

