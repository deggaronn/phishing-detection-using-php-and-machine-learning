#!C:\Users\sujan\AppData\Local\Programs\Python\Python37\python
print("Content-type: text/html\r\n\n")
# -*- coding: utf-8 -*-

#importing libraries
from sklearn.externals import joblib
import inputScript
import sys

#load the pickle file
classifier = joblib.load('rf_final.pkl')

#input url

url= sys.argv[1]
#checking and predicting
checkprediction = inputScript.main(url)
prediction = classifier.predict(checkprediction)
if prediction==1:
	print(" THIS IS PHISHING URL")
else:
	print(" THIS IS NOT PHISHING URL")
