
![](client/static/portfolio.png?raw=true)

### Install Locally

* clone from GitHub
* run `yarn` and `composer install` to install all of your deps
* copy `.env.example` to `.env` and configure it to your likings
* TL;DR
 ```bash
git clone https://github.com/chis0m/RimsysApp.git && cd RimsysApp; yarn install; composer install; cp .env.example .env; yarn api; yarn dev
 ```


### Analyses and Linting
```bash
    yarn style
    yarn analyse
    composer cbf
    composer cs
```


### Test
```bash
  yarn php-test
```

## Cloud Setup
- Run terraform script from [RimsysTerraform](https://github.com/chis0m/RimsysTerraform) to setup infrastructure
  - Update the terraform.auto.tfvars file to your own values first
- Apply argocd [application.yaml](https://github.com/chis0m/RimsysGitOps/blob/master/argocd/application.yaml) at [RimsysGitOps](https://github.com/chis0m/RimsysGitOps)
- Access the argocd application 
    - Port Forward `kubectl port-forward svc/argocd-server 8080:443 -n argocd`
    - Login: username: `admin`, get password with `kubectl -n argocd get secret argocd-initial-admin-secret -o jsonpath="{.data.password}" | base64 --decode && echo`


### Optimization
Dockefile
- Layering
- optimized image sizes, frontend(bullseye-slim) 338mb, backend(alpine) 350-370mb
- using .dockerignore
- importing env with kustomize fil,e rather than using configmap object
- frontend communicates to backend through service and not through the internet
- uses initcontainer to run laravel migration
- use terraform to create infrastructure and install argocd
- setup readonly permission for the cluster