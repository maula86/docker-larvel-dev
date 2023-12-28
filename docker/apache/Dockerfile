FROM httpd:2.4.58

ENV TZ=Asia/Jakarta
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY msapi.apache.conf /usr/local/apache2/conf/msapi.apache.conf

RUN echo "Include /usr/local/apache2/conf/msapi.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf