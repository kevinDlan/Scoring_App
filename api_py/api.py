#!C:\Users\Admin\AppData\Local\Programs\Python\Python39\python.exe
import os
import urllib.parse
import numpy as np
import pandas as pd
from pickle import load
import math

query = os.environ['QUERY_STRING']
get_query = urllib.parse.parse_qs(os.environ['QUERY_STRING'])


# Get all Value send by API
var1 = str(get_query['var1'])[2:-2]
var2 = str(get_query['var2'])[2:-2]
var3 = str(get_query['var3'])[2:-2]
var4 = str(get_query['var4'])[2:-2]
var5 = str(get_query['var5'])[2:-2]
var6 = str(get_query['var6'])[2:-2]
var7 = str(get_query['var7'])[2:-2]

# Create dataframe columns
col = ['Total_Ct_Chng_Q4_Q1','Total_Trans_Amt','Total_Revolving_Bal','Total_Relationship_Count','Total_Amt_Chng_Q4_Q1','Total_Trans_Ct','Contacts_Count_12_mon']
data = [float(var1),float(var2),float(var3),float(var4),float(var5),float(var6),float(var7)]
# Put Data in a pandas dataframe 
X = pd.DataFrame(np.array([data]),columns=col)

#Load Our Normalize 
normalizer = load(open('normalizer.pkl','rb'))

#Normalize data for trainning
X = normalizer.transform(X)

# Load our model
model = load(open('model.pkl','rb'))

#Make prediction with our model
prediction = model.predict(X)
pred_prob = model.predict_proba(X)

#print prediction result to send it to our php file
print('Content-Type: text/html\n')
print(prediction[0],format(pred_prob[0][0],'.4f'),format(pred_prob[0][1],'.4f'))
