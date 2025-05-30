# Latest as of 05/04/19
FROM wordpress:php7.1 

# Define build time args
ARG dbu  
ARG dbp 
ARG dbh 
ARG dbn  

# Define the required WordPress environment variables
# The values are set via the build args (defined above)
ENV WORDPRESS_DB_USER=$dbu
ENV WORDPRESS_DB_PASSWORD=$dbp
ENV WORDPRESS_DB_HOST=$dbh
ENV WORDPRESS_DB_NAME=$dbn

# Copy wordpress files & install plugin/theme dependencies via composer
COPY site/ /var/www/html

# Update wp-config 
RUN sed -i "/^.*stop editing.*/i define( 'AS3CF_AWS_USE_EC2_IAM_ROLE', true );\n\n" /usr/src/wordpress/wp-config-sample.php
RUN sed -i -e 's/wp_/wpvgc_/g' /usr/src/wordpress/wp-config-sample.php
