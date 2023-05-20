## Laravel Email Database Log

The Laravel Email Database Log package is a convenient way to log outgoing emails in your Laravel application to a database. Instead of relying solely on email service providers' logs or writing custom logging code for each email, this package provides a simple and consistent way to store email data directly in your application's database.

### Installation

You can install the Laravel Email Database Log package via Composer by running the following command:
```
composer require bushart/emaillog   
```

After installation, publish the package configuration file using the vendor:publish Artisan command:

```
php artisan vendor:publish --tag=migrations
```


### Usage

Once the package is installed and configured, outgoing emails sent using Laravel's Mail functionality will be automatically logged to the specified database table. The package provides an event listener that captures the email data and stores it in the database.

To view the logged emails, you can query the database table directly or create a dedicated interface within your application to retrieve and display the email log entries.



### Support

If you encounter any issues with this package, please open an issue on the GitHub repository or contact us at busharthussain@gmail.com.

I hope this example description helps you write your own README file! Let me know if you have any other questions.