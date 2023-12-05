# Multi-Tenant Login App README

## Overview 🌐
This login app allows for multi-tenancy, managing tenants with their names, domains, and individual databases. The system includes a middleware to dynamically select the current tenant's database. Migration and seeding commands streamline the setup for both the system and tenant databases.

## Features ✨

- **Multi-Tenancy**: Each tenant has a dedicated database, securing their data isolation.
- **Dynamic Database Selection**: Middleware dynamically switches the database based on the current tenant.
- **Migration Commands**: System and tenant migration commands for seamless database setup.
- **Seed Commands**: Populate both system and tenant databases with relevant seed data.
- **User Management**: Each tenant's database has its user records.
- **Tenant Facade**: Facade for using TenantService functions

## Getting Started 🚀

### Prerequisites
- PHP (Version X.X.X)
- Laravel (Version X.X.X)
- Composer

### Installation
1. Clone the repository: `git clone https://github.com/yourusername/your-repo.git`
2. Install dependencies: `composer install`
3. Configure your environment variables.

### Configuration
- Define tenants in a dedicated table, including names, domains, and database names.
- Adjust the middleware to handle dynamic database switching based on the current tenant.


