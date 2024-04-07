## DevBooks Installation with Sanctum Authentication

**Prerequisites:**

-   Docker installed and configured
-   Git installed
-   Postman or similar tool for API testing

**Steps:**

1.  **Clone the repository:**

```bash
git clone https://github.com/robinson4k/DevBooks.git
cd DevBooks
```

2.  **Create the .env file:**

Copy the contents of the `.env.example` file to `.env` and make the necessary changes, such as database credentials.

3.  **Check port 80:**

Before starting Docker, make sure port 80 is free. You can check this using the command:

```bash
netstat -ano | grep ':80'
```

If there is any process using port 80, stop it before continuing.

4.  **Start Docker:**

```bash
docker-compose up -d
```

5.  **Access the application:**

The application will be available at `http://localhost:80`.

6.  **Test the API:**

The available API routes are:


|Method   |Route                |Description                  |Controller                  |Authentication|
|---------|---------------------|-----------------------------|----------------------------|--------------|
|POST     |`/api/login`         |Authenticate user            |`AuthController@login`      |Não           |
|POST     |`/api/register`      |Register new user            |`RegisterController@store`  |Não           |
|POST     |`/api/logout`        |Logout user                  |`AuthController@logout`     |Bearer Token  |
|GET      |`/api/books`         |List all books               |`BookController@index`      |Bearer Token  |
|POST     |`/api/books`         |Create a new book            |`BookController@store`      |Bearer Token  |
|GET      |`/api/books/{book}`  |Displays a specific book     |`BookController@show`       |Bearer Token  |
|PUT/PATCH|`/api/books/{book}`  |Update a specific book       |`BookController@update`     |Bearer Token  |
|DELETE   |`/api/books/{book}`  |Remove a specific book       |`BookController@destroy`    |Bearer Token  |
|GET      |`/api/stores`        |List all stores              |`StoreController@index`     |Bearer Token  |
|POST     |`/api/stores`        |Create a new store           |`StoreController@store`     |Bearer Token  |
|GET      |`/api/stores/{store}`|Displays a specific store    |`StoreController@show`      |Bearer Token  |
|PUT/PATCH|`/api/stores/{store}`|Update a specific store      |`StoreController@update`    |Bearer Token  |
|DELETE   |`/api/stores/{store}`|Remove a specific store      |`StoreController@destroy`   |Bearer Token  |


**Notes:**

-   Routes that require Bearer Token authentication require the token to be sent in the request header.
-   Use Postman or a similar tool to test the API.
-   Refer to the Laravel documentation for more information about routes, authentication, and controllers.
-   This guide is just a starting point. You can customize the application according to your needs.