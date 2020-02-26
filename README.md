# LAMP Dev Env with HTTPS

## Mac Instructions
1. Clone This Repo
2. `$ cp example.env .env`
3. Change the `SITE_URL` field in `.env` to the domain you want (by default it's `mycustomdomain.test`)
4. `$ brew install mkcert nss`
5. `$ ./generate-certs-mac.sh`
6. Add an entry to your `/etc/hosts` file. `127.0.0.1	mycustomdomain.test`
7. `$ docker-compose up`

Then open up `https://mycustomdomain.test`. Put your PHP app in the `/www` folder.

## Tips + Tricks
* If you want different ports (other than localhost:80), edit the `docker-compose.yml` file. (If you want to access the https website on port `1337`, then change `443:443` to `1337:443` under `phpwebserver`.)
* If you want to access variables from your env file, by default in the `docker-compose.yml` I mount it as `/etc/environment` in the container. In PHP you can grab the vars like this:
```
$env = parse_ini_file("/etc/enviornment", true, INI_SCANNER_RAW);
```

## Gotchas
* PHP MyAdmin only works over http... I'm open to a PR that fixes this.
* If you want to use this with multiple projects, make sure to change the `container_name`s in `docker-compose.yml`.
