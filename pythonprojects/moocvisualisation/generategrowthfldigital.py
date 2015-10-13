import json
from pymongo import MongoClient
import requests
from urllib import urlencode
import time
import re
import datetime
#Mongodb----------------------------------------------------------------
client = MongoClient('localhost', 27017)
db = client['tweets']
collection = db['tweets']

#-----------------------------------------------------------------------

fromDate = datetime.datetime.now() - datetime.timedelta(days=60)
print fromDate
reses = collection.find({"tag": "fldigital"})

print reses

data = []
for i in range(0, 60):
	data.append(0)
for res in reses:
	date = datetime.datetime.strptime(res['date'], "%a %b %d %H:%M:%S +0000 %Y")
	diff = (date - fromDate).days
	if(diff < 0):
		diff = 0
	data[diff] += 1

accum = 0
for i in range(0, 60):
	data[i] += accum
	accum = data[i]
	
finalData = [{"data": data}]
with open("data/fldigitalgrowth.json", "w") as outfile:
    json.dump(finalData, outfile)

