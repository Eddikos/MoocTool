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

mentionsDataset = {}
procMentionsDataset = []

retweetsDataset = {}
procRetweetsDataset = [];

for res in reses:
	retweet = re.match(r"^RT @[a-zA-Z_]+", res['tweetText'])
	retweetUser = ""
	if(retweet):
		retweetUser = res["tweetText"][0:retweet.end()]
		res['tweetText'] = res['tweetText'][retweet.end():]
	
	mentions = re.findall(r"@(\w+)", res['tweetText'])

	if(len(retweetUser) > 0):
		if(not res["twitterUsername"] in retweetsDataset):
                        retweetsDataset[res["twitterUsername"]] = {}
                if(not retweetUser in retweetsDataset[res["twitterUsername"]]):
                        retweetsDataset[res["twitterUsername"]][retweetUser] = {"count": 1, "user_name": retweetUser}
                else:
                        retweetsDataset[res["twitterUsername"]][retweetUser]['count'] += 1

	for mention in mentions:
		if(not res["twitterUsername"] in mentionsDataset):
			mentionsDataset[res["twitterUsername"]] = {}
		if(not mention in mentionsDataset[res["twitterUsername"]]):
		        mentionsDataset[res["twitterUsername"]][mention] = {"count": 1, "user_name": mention}
		else:
			mentionsDataset[res["twitterUsername"]][mention]['count'] += 1

for mention in mentionsDataset:
	userList = []
	for user in mentionsDataset[mention]:
		userList.append(mentionsDataset[mention][user])
	procMentionsDataset.append({"user_name": mention, "mentions": userList})

for retweet in retweetsDataset:
        userList = []
        for user in retweetsDataset[retweet]:
                userList.append(retweetsDataset[retweet][user])
        procRetweetsDataset.append({"user_name": retweet, "retweets": userList})

with open("data/flwebscimentions.json", "w") as outfile:
    json.dump(procMentionsDataset, outfile)

with open("data/flwebsciretweets.json", "w") as outfile:
    json.dump(procRetweetsDataset, outfile)
