


## About the Project
This project is a simple Laravel blog, with a Vue frontend and a docker wrapper meant for ease of use.
It comes with a single User in the database seeder meant for testing

## Booting Up
To start the project up you'll have to follow the steps below.

 1. You will need to make sure you have docker installed
	 a. If you don't, you can follow the steps to install Docker [here](https://docs.docker.com/get-docker/)
 2. Once docker is installed you just need to run ``docker-compose up --build`` for the initial build
	 a. After the first run you can use ``docker-compose up`` without the build flag
	 b. To shut down the project you just need to run ``docker-compose down``
	 c. These commands might be different depending on the docker version you installed
 3. Once docker has fully compiled you need to go into the docker container and run the following commands to ensure that all PHP and JavaScript vendor modules are installed correctly
	 a. ``composer install -v``
	 b. ``npm i``
  

## Security Vulnerabilities

 
If you discover a security vulnerability within this, please either create pull request for the fix or contact the Dor Golombick on  [dor.golo@outlook.com](mailto:dor.golo@outlook.com). All security vulnerabilities will be promptly addressed.

  

## License

 The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
