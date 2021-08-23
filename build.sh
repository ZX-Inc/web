docker run --name zxipdb-web \
-v /Users/charles/git/github/ZX-Inc/zxipdb-web:/data/project \
-p 9501:9501 -it \
--privileged -u root \
--entrypoint /bin/sh \
hyperf/hyperf:8.0-alpine-v3.14-swoole-v4.7.1