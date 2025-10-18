# GameForge - Gaming Accessories E-Commerce Platform

## Overview
GameForge is an e-commerce platform dedicated to gaming accessories. This application provides a complete online shopping experience for gamers looking to purchase gaming peripherals, equipment, and accessories.

## Features
- Browse gaming accessories catalog
- Product search and filtering
- Shopping cart functionality
- User authentication and profiles
- Order management
- Admin dashboard for inventory management

## Prerequisites
Before running this application, ensure you have the following installed:
- Node.js (v14 or higher)
- npm or yarn package manager
- MongoDB (for database)

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd GameForge_-1
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Set up environment variables**
   Create a `.env` file in the root directory with the following:
   ```
   PORT=3000
   MONGODB_URI=mongodb://localhost:27017/gameforge
   JWT_SECRET=your_jwt_secret_key
   ```

4. **Start MongoDB**
   Make sure MongoDB is running on your system:
   ```bash
   mongod
   ```

## Running the Application

### Development Mode
```bash
npm run dev
```

### Production Mode
```bash
npm start
```

The application will be available at `http://localhost:3000`

## Project Structure
```
GameForge_-1/
├── public/          # Static files (images, CSS, JS)
├── src/
│   ├── models/      # Database models
│   ├── routes/      # API routes
│   ├── controllers/ # Request handlers
│   ├── middleware/  # Custom middleware
│   └── views/       # Frontend templates
├── .env             # Environment variables
└── README.md        # This file
```

## Usage

1. **Browse Products**: Navigate to the home page to view available gaming accessories
2. **Create Account**: Sign up for a new account to start shopping
3. **Add to Cart**: Select products and add them to your shopping cart
4. **Checkout**: Complete your purchase through the checkout process
5. **Admin Access**: Log in with admin credentials to manage products and orders

## Technologies Used
- Frontend: HTML, CSS, JavaScript
- Backend: Node.js, Express.js
- Database: MongoDB
- Authentication: JWT

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request.

## License
This project is licensed under the MIT License.

   
