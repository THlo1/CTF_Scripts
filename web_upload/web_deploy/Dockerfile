FROM sakadonohito/php58.6.23-apache

COPY ./html/ /var/www/html/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /usr/local/etc/php/php.ini

RUN mkdir /var/www/html/upload/ && \
	chmod -R 755 /var/www/html/ && \
    chmod -R 777 /var/www/html/upload/ && \
    chown -R root:root /var/www/html 

ENV FLAG=flag{verY_g00d_up104d_sk1lls}

CMD sh -c "echo $FLAG > /flag  && apache2-foreground"
