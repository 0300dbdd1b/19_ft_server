FROM debian:buster

MAINTAINER Noah Addino <naddino@student.s19.be>

RUN apt-get update -y 			\
&& 	apt-get install sudo -y 	\
&& 	apt-get install curl -y 	\
&& 	apt-get install wget -y 	\
&& 	apt-get clean -y

# install nginx - mariadb - php 
RUN apt-get install nginx -y			\
&&	apt-get install mariadb-server -yq	\
&&	apt-get install php -yq 			\
&& 	apt-get install php-mysql -yq		\
&& 	apt install php7.3 php7.3-fpm php7.3-mysql php-common php7.3-cli php7.3-common php7.3-json php7.3-opcache php7.3-readline -yq \
&& 	apt install php-json php-mbstring -y

# install phpmyadmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.1/phpMyAdmin-5.0.1-all-languages.tar.gz 
RUN	tar -zxzf phpMyAdmin-5.0.1-all-languages.tar.gz 			\
&& mv phpMyAdmin-5.0.1-all-languages /var/www/html/phpMyAdmin	\
&& rm phpMyAdmin-5.0.1-all-languages.tar.gz 					\
&& mkdir /var/www/html/phpMyAdmin/tmp 							\
&& chmod 777 /var/www/html/phpMyAdmin/tmp

# phpMyAdmin blowfish secret generator change
ADD /srcs/config.inc.php /var/www/html/phpMyAdmin
RUN rm /var/www/html/phpMyAdmin/config.sample.inc.php 

# install SSL
RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64
RUN mv mkcert-v1.1.2-linux-amd64 mkcert \
&& chmod 777 /mkcert && /mkcert -install && /mkcert localhost.com

# install Wordpress
RUN cd /tmp 											\
&& curl -O https://wordpress.org/latest.tar.gz			\
&& tar xzvf latest.tar.gz 								\
&& mkdir /var/www/html/wordpress 						\
&& sudo cp -a /tmp/wordpress/. /var/www/html/wordpress	\
&& sudo chown -R www-data:www-data /var/www/

COPY srcs/wp-config.php /var/www/html/wordpress

# Config nginx
ADD /srcs/nginx.conf /etc/nginx/sites-available/
ADD /srcs/nginx.conf /etc/nginx/sites-enabled/

# change the default html
RUN rm var/www/html/index.html \
&& rm var/www/html/index.nginx-debian.html
ADD /srcs/index.html /var/www/html/

# Config mariadb
ADD /srcs/mysql_db_config.sh ./

#service start
RUN service nginx start \
&& service php7.3-fpm start \
&& service mysql start

EXPOSE 80 443

CMD /bin/bash ./mysql_db_config.sh && sleep infinity & wait
