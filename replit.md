# CityPulse - Issue Reporting System

## Overview
CityPulse is a JSON-based web application for reporting and managing local community issues like potholes, garbage, streetlights, and other problems. Built with PHP 8.4, it provides a simple interface for citizens to report issues and admins to manage them.

## Recent Changes
- **2025-11-08**: Project setup
  - Installed PHP 8.4
  - Implemented CityPulse issue reporting system
  - Set up JSON-based data storage
  - Created admin panel with authentication
  - Added image upload functionality

## Project Structure
```
/
├── index.php          # Home page showing all reported issues
├── report.php         # Form for users to report new issues
├── login.php          # Admin login page
├── admin.php          # Admin panel to manage issues
├── logout.php         # Admin logout handler
├── toggle.php         # Toggle issue status (Pending/Resolved)
├── delete.php         # Delete an issue and its image
├── functions.php      # Core functions for the app
├── style.css          # Application styles
├── data.json          # JSON file storing all issues
├── admin.json         # Admin credentials (auto-created)
├── uploads/           # Directory for uploaded images
└── replit.md          # This file
```

## Features
- **Public Features**:
  - View all reported issues on the home page
  - Report new issues with details (name, email, title, description, category, image)
  - Image upload support for issue documentation
  
- **Admin Features**:
  - Secure login (default: username: `admin`, password: `admin123`)
  - View all reported issues in a table
  - Toggle issue status between Pending and Resolved
  - Delete issues (including uploaded images)

## Technical Stack
- **Language**: PHP 8.4
- **Server**: PHP built-in development server
- **Port**: 5000
- **Data Storage**: JSON files (no database required)
- **Authentication**: Session-based with password hashing

## Default Admin Credentials
- **Username**: admin
- **Password**: admin123

## User Preferences
None documented yet.
