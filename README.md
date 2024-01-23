# Project_5 - My Personal PHP Blog

## Project Overview
This project is a personal blog developed in PHP, showcasing my web development skills. The blog is divided into two sections: one accessible to all visitors and an administration section reserved for registered users with administrator rights.

### Public Pages
1. **Home Page:**
   - Name and surname
   - Photo/logo
   - Catchphrase
   - Navigation menu
   - Contact form
   - Link to PDF CV
   - Links to social media profiles

2. **List of Articles Page:**
   - Title
   - Last modification date
   - Short description (chapô)
   - Link to the full article

3. **Individual Article Page:**
   - Title
   - Short description (chapô)
   - Content
   - Author
   - Last update date
   - Form to add a comment
   - List of approved comments

### Administration Pages
1. **Add Article Page:**
   - Form to add a new article

2. **Edit Article Page:**
   - Form to edit an existing article

3. **Manage Articles Pages:**
   - List of articles with options to edit or delete each article

4. **User Authentication Pages:**
   - Login and registration pages for users
   - Only registered users with administrator rights can access the administration section

### Footer Menu
- Link to the blog administration

## Installation Instructions
1. Clone the repository: `git clone https://github.com/ThibDel8/Projet_5.git`
2. Set up the PHP environment and web server.
3. Import the database using the provided file.
4. Install dependencies with Composer: `composer install`
5. Configure database information in the `.env` file.
6. Start the server: `php -S localhost:8000 -t public/`

## UML Diagrams
- Use case, class, and sequence diagrams are available in the "diagrams" folder.

## Issues
- Find the complete list of project-related issues on the [GitHub Issues page](https://github.com/ThibDel8/Projet_5/issues).

## Code Quality Analysis
- [Link to SymfonyInsight Analysis](https://insight.symfony.com/projects/e6a6f7dc-5196-4777-b491-ef7b49ff1bb6)

## Contributors
- Delattre Thibault

## License
This project is under the MIT license. See the [LICENSE.md](LICENSE.md) file for more information.
