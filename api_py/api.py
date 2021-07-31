#!C:\Users\Admin\AppData\Local\Programs\Python\Python39\python.exe
import os
import urllib.parse
import numpy as np
import pandas as pd
from pickle import load

query = os.environ['QUERY_STRING']
get_query = urllib.parse.parse_qs(os.environ['QUERY_STRING'])

# def greeting(name, surname):
    # return ('Hello '+str(name).capitalize()+ ' ' +str(surname).capitalize() +' How are you')

#print(f'<h1>{greeting("Kevin","KONE")}</h1>')
var1 = str(get_query['var1'])[2:-2]
var2 = str(get_query['var2'])[2:-2]
var3 = str(get_query['var3'])[2:-2]
var4 = str(get_query['var4'])[2:-2]
var5 = str(get_query['var5'])[2:-2]
var6 = str(get_query['var6'])[2:-2]
var7 = str(get_query['var7'])[2:-2]

# var1,var2,var3,var4,var5,var6,var7 = 1,2,3,4,5,6,7

col = ['Total_Ct_Chng_Q4_Q1','Total_Trans_Amt','Total_Revolving_Bal','Total_Relationship_Count','Total_Amt_Chng_Q4_Q1','Total_Trans_Ct','Contacts_Count_12_mon']

X = pd.DataFrame(np.array([[float(var1),float(var2),float(var3),float(var4),float(var5),float(var6),float(var7)]]),columns=col)

normalizer = load(open('normalizer.pkl','rb'))

X = normalizer.transform(X)

model = load(open('model.pkl','rb'))

prediction = model.predict(X)


print('Content-Type: text/html\n')
print(prediction[0])