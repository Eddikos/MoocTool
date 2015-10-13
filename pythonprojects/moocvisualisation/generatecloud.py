import json
import time
import re

#-----------------------------------------------------------------------

f = open('data/flwebscihashtags.json', "r")
data = json.load(f);
res = []

for row in data:
	tweets = 0
	for tweet in row["users"]:
		tweets += tweet["count"]
	res.append({"text": row["hashtag"],"size": tweets})

with open("data/flwebscicloud.json", "w") as outfile:
    json.dump(res, outfile)
