#easy_tornado
#secure cookie 是Tornado 用于保护cookies安全的一种措施
#获得cookie_secret，编写脚本，计算md5(cookie_secret + md5(filename))
import hashlib

filename = '/fllllllllllllag'
cookie_secret ="6fe556f1-9b77-481e-9535-c4e9f803b89d"

def getvalue(string):
    md5 = hashlib.md5()
    md5.update(string.encode('utf-8'))
    return md5.hexdigest()

def merge():
    print(getvalue(cookie_secret + getvalue(filename)))

merge()