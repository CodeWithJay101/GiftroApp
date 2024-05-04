# Giftro Gift Shop

### Overview
<p>The Giftro Gift Shop webpage consist of a few pages and sections</p>
<ul>
  <li>Home page</li>
  <li>About page</li>
  <li>Products page</li>
  <li>Item pages (for individual items)</li>
  <li>Contact page</li>
  <li>Cart page</li>
  <li>Login & Signup modals</li>
</ul>
<p>Tech Stack:</p>
<ul>
  <li>HTML</li>
  <li>CSS</li>
  <li>Javascript</li>
  <li>PHP</li>
</ul>

### Requirements for running this webpage
##### Must have:
<ul>
  <li>Start up Apache and MySQL servers</li>
  <li>SQL database to store the database and tables for this webpage (ideally through phpMyAdmin)</li>
</ul>

###### (This step by step guide mainly caters to the Windows OS)
### Steps to setup the project within XAMPP/WAMPP
<ol>
  <li>Make sure to locate the file path where the webpage will run on your local system (depending where your server is located)</li>
  <ul>
    <li>If you are using WAMPP - Your default file path should be <code>C:\wamp64\www</code></li>
    <li>If you are using XAMPP - Your default file path should be <code>C:\xampp\htdocs</code></li>
  </ul>
  <br>
  <li>After you navigate to this folder, bring up the terminal within this folder path</li>
<ul>
    <li>Right click anywhere within the folder and pick the <code>Open in Terminal</code> option</li>
  </ul>
  <br>
  <li>Within the terminal, type <code>git clone https://github.com/CodeWithJay101/webdev</code>. Once the cloning process is done you should see a new folder <code>webdev</code> created</li>
</ol> 

### Steps to setup the database for the project
<ol>
  <li>Navigate into the <code>webdev</code> folder, you will see an sql file <code>webdev.sql</code></li>
  <br>
  <li>Open the <code>webdev.sql</code> file and copy all the content within the sql file</li>
  <br>
  <li>Navigate to <code>http://localhost/phpmyadmin/</code> and paste all the contents into the <code>SQL</code> section in the phpMyAdmin interface and press <code>Go</code></li>
  <br>
  <img src="https://github.com/CodeWithJay101/GiftroApp/assets/132254114/433083ff-8e6b-4910-8306-1b8014e03604" alt="image1" width="100%"/>
  <br>
  <br>
  <li>A new database with the name <code>webdev</code> should be created</li>
</ol> 

### Database Example View
<img src="https://github.com/CodeWithJay101/webdev/assets/132254114/cb7d96f8-8943-4477-943e-bb29fc426b2a" alt="image1" width="auto"/>

### Webpage Overall UI
<img src="https://github.com/CodeWithJay101/GiftroApp/assets/132254114/4aea232f-1696-4dcc-b6ad-3b775cbe22b8" alt="image1" width="100%"/>
<img src="https://github.com/CodeWithJay101/GiftroApp/assets/132254114/5038a6d2-90c0-42c5-83ee-4bf1e5a58761" alt="image1" width="100%"/>
<img src="https://github.com/CodeWithJay101/webdev/assets/132254114/139b33e0-174a-49e5-ac81-3fdbca498dba" alt="image1" width="100%"/>
<img src="https://github.com/CodeWithJay101/webdev/assets/132254114/2b75c80c-2281-48a6-920b-e484798b45fc" alt="image1" width="100%"/>
<img src="https://github.com/CodeWithJay101/webdev/assets/132254114/fcc58460-d107-4a1c-a9ff-afc5480c4876" alt="image1" width="100%"/>
<p>*Note: Design currently not suited for mobile interfaces</p>
