## Introduction
A fun side project of Mini Trading Competition leaderboard with React as a front end and Laravel powering the backend. Uses Inertia adapter.

## Prepare your environment with Docker

Make sure .env is present. Use the .env.example to create your .env file. Make sure the variables is aligned with your docker-compose.yaml files as well.
On the root of the project <code>docker compose up --build -d</code>
!well thats how I do it anyways

##Get the servers running.
Docker already takes care of getting the laravel server running. So you only need to run the node server by exec'ing into the laravel-react-container.

To exec into the container run <code>docker exec -it {containerid or containername} /bin/bash</code>
Then run <code> npm run dev </code>

Make sure on the vite.config.js the server is looks like this and pass the node port number that you defined in the docker-compose.yaml file
<pre>
<code>
  server: {
        host: '0.0.0.0',
        port: '5173',
        hmr: {
            host: 'localhost', // or your Docker host IP if accessing from host browser
            protocol: 'ws',
        }
    },
</code>
</pre>

##Database setup
Migrate the database <code>php artisan migrate</code>

Seed the database <code>php artisan migrate db:seed</code>

Open a new terminal and run the worker <code>php artisan schedule:work</code>

Open a terminal to generate dummy leaderboard using tinker data <code>App\Models\Mt4Trades::generateRandomTrades()</code>
Run that as many times you need to generate data. Its supposed to simulate trade data coming from a trading server which is being saved to a mysql table.

##Load the page <code>http://localhost:8000/leaderboard</code>
The leaderboard table should automaticaly reflect as soon as there is change in the mt4_trades table from your tinker. 


