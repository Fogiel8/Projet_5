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

4. **User Authentication Pages:**
   - Login and registration pages for users
   - Only registered users with administrator rights can access the administration section

### Administration Pages
1. **Add Article Page:**
   - Form to add a new article

2. **Edit Article Page:**
   - Form to edit an existing article

3. **Manage Articles Pages:**
   - List of articles with options to edit or delete each article

### Footer Menu
- Link to the blog administration

## Site Map
- **Level 0: Home**
  - Description: Landing page presenting the blog, featuring the 3 latest articles (clickable to view full content), a contact form, and a link to download my CV.

- **Level 1: Articles List**
   - Description: Page displaying a list of all articles.

- **Level 2: Article Page**
  - Description: Page displaying the content of a specific article.
   - Comment Section
      - Description: Section allowing users to leave comments on the article.

- **Level 3: Article Management (Admin Only)**
  - Description: Page for article management tasks.
   - Edit Article
      - Description: Page to edit the content of a specific article.
   - Delete Article
      - Description: Delete the article.

## Installation Instructions
1. Clone the repository: `git clone https://github.com/ThibDel8/Projet_5.git`
2. Set up the PHP environment and web server.
3. Import the database using the provided file.
4. Install dependencies with Composer: `composer install`
5. Configure database information in the `.env` file.
6. Start the server: `php -S localhost:8000 -t public/`

## UML Diagrams
- Use case, class, and sequence diagrams are available in the "diagrams" folder.

- **Footer (Accessible on any page)**
  - Description: Footer section with links to legal information (terms, cookies, privacy), and Admin Page.
   - Description: Page for approving user comments (only for admins).

- **Navigation (Accessible on any page)**
   - Login/Registration
      - Description: Page for user authentication and registration.
   - Profile Page
      - Description: User profile page with the list of created articles (with the option to edit or delete).
   - Social Networks
      - Description: links to social media pages

## Issues
- Find the complete list of project-related issues on the [GitHub Issues page](https://github.com/ThibDel8/Projet_5/issues).

## Code Quality Analysis
- [Link to SymfonyInsight Analysis](https://insight.symfony.com/projects/e6a6f7dc-5196-4777-b491-ef7b49ff1bb6)

## Contributors
- Delattre Thibault

## License
This project is under the MIT license. See the [LICENSE.md](LICENSE.md) file for more information.
