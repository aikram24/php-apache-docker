## PHP-APACHE-DOCKER

You can have your own codes in `./src`

```
$> docker build -t phpapp:latest .
```

Once, image is sucessfully build you can run start the container with the build image
```
$> docker run --rm -p 8080:80 -it phpapp:latest
```

You can access the app by going to `http://localhost:8080/`