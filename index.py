
print("Content-type: text/html\r\n\n")
from sklearn.externals import joblib
import inputScript
import sys

classifier = joblib.load('rf_final.pkl')

url= sys.argv[1]
checkprediction = inputScript.main(url)
prediction = classifier.predict(checkprediction)
if prediction==1:
	print(" THIS IS PHISHING URL")
else:
	print(" THIS IS NOT PHISHING URL")
