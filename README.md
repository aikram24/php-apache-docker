## PHP-APACHE-DOCKER

For demo this source code list the S3 buckets and the Objects in the bucket. You can have your own codes in `./src`


To test the demo create aws config with name `awsconfig` in this cloned directory
```
[default]
aws_access_key_id = XXXXXXXXXXXXX
aws_secret_access_key = XXXXXXXXXXXXXXXXXX
```


Now, you can build the docker image by running following command:
```
$> docker build -t phpapp:latest .
```

Once, image is sucessfully build you can run start the container with the build image
```
$> docker run --rm -p 8080:80 -it phpapp:latest
```

You can access the app by going to `http://localhost:8080/aws.php`