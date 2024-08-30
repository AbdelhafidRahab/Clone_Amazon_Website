# Clone_Amazon_Website

This is a Laravel project styled with Tailwind CSS. The project includes [Stripe payment method].

## Screenshots

Here are some screenshots of the project:

### 1: Home

![Feature 1 Screenshot](https://i.ibb.co/cXMW8WD/Home.png)

### 1: Category

![Feature 1 Screenshot](https://i.ibb.co/bFN65Jy/Category.png)

### 1: Product-show

![Feature 1 Screenshot](https://i.ibb.co/9rHW2zb/Product-show.png)

### 1: Register

![Feature 1 Screenshot](https://i.ibb.co/S65HYZG/Register.png)

### 1: Login

![Feature 1 Screenshot](https://i.ibb.co/r28F6nn/Login.png)

### 1: Cart

![Feature 1 Screenshot](https://i.ibb.co/ZmPQ3Xk/Cart.png)

### 1: Checkout

![Feature 1 Screenshot](https://i.ibb.co/LdRpWVZ/Checkout.png)

### 1: Checkout-success

![Feature 1 Screenshot](https://i.ibb.co/sJsfR6n/Checkout-success.png)

## Installation and Setup

To run this project locally, follow these steps:

1. **Navigate to the project directory:**
   ```bash
   cd Clone_Amazon_Website

2. **Install the dependencies: Make sure you have Composer and npm installed, then run the following commands**
   ```bash
   composer install
   npm install

3. **Environment setup: Copy the .env.example file and create your own .env file**
   ```bash
   cp .env.example .env

4. **Then, generate an application key:**
   ```bash
   php artisan key:generate
Configure your database and other environment variables in the .env file.

5. **Run database migrations: Make sure your database is set up and run:**
   ```bash
   php artisan migrate

6. **Build your assets: To build your Tailwind CSS and JavaScript assets, run:**
   ```bash
   npm run dev

7. **Serve the application: Finally, start the development server with:**
   ```bash
   php artisan serve

## Contributing

Feel free to fork this project, submit issues, or create pull requests if you'd like to contribute.

## License

This project is licensed under the MIT License.
 
