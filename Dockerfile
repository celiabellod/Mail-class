FROM thecodingmachine/php:7.4.16-v4-apache

RUN sudo apt-get -y update && \
sudo apt-get -y install msmtp msmtp-mta