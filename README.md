<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->





<!-- PROJECT LOGO -->
# <center>DB term project</center>
## **<center>My First Project</center>**


<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#Brief-Overview">Brief Overview</a>
    <li><a href="#built-with">Built With</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#E-R-Diagram">E-R Diagram</a></li>
    <li><a href="#Source-Code-Summary-Manual">Source Code Summary Manual</a></li>
    <li><a href="#relation-manual">Relation Manual</a></li>
    <li><a href="#Table-Schema">Table Schema</a></li>
    <li><a href="#transaction-atomicity">Transaction Atomicity</a></li>
    <li><a href="#transaction-isolation-level">Transaction Isolation Level</a></li>
    <li><a href="#What-I-Learned">What I Learned</a></li>
  </ol>
</details>



<!-- Brief Overview -->
## Brief Overview
### Web database application system
An application that provides a service in which popular songs are recommended and could save and edit playlists.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- BUILT WITH -->
## Built With

* <img src="https://img.shields.io/badge/MariaDB-003545?style=flat-square&logo=MariaDB&logoColor=white"/>
* <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=PHP&logoColor=white"/>

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- ROADMAP -->
## Roadmap

- [O] Conceptual design
  - [O] E-R diagram
  - [O] function, process specification
- [O] Logical design
  - [O] Relation specification
  - [O] Module specification
- [O] System implementation
  - [O] System test

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- E-R DIAGRAM -->
## E-R Diagram
![E-R Diagram](https://user-images.githubusercontent.com/105041834/190562307-8ca7a7f2-a35f-45dc-ac3b-c33eb2ded76f.jpg)  

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- Source Code Summary Manual -->
## Source Code Summary Manual
A brief explanation of the source code per php file
<details>
<summary>Details</summary>
  
![source code manual](https://user-images.githubusercontent.com/105041834/202246588-ef4ebe6a-3b75-4704-8b9b-7b0e6a094a9d.JPG)
![source code manual_2](https://user-images.githubusercontent.com/105041834/202246593-ec0d0ece-29da-40b1-8581-3900bb7cd7f7.JPG)
  
</details>

<!-- Relation Manual -->
## Relation Manual
Relation meta data
<details>
<summary>Details</summary>
![song](https://user-images.githubusercontent.com/105041834/202249861-65b6d226-b2aa-49e4-92a4-c6694a28ffcd.png)
![playlist](https://user-images.githubusercontent.com/105041834/202249865-cf298633-e0f6-483d-83f7-13382121aa09.png)
![play_song_list](https://user-images.githubusercontent.com/105041834/202249869-1e18895e-b713-4125-a007-d8a5a60f964d.png)
![fee_policy](https://user-images.githubusercontent.com/105041834/202249874-8e09b87c-48ad-4e02-b257-97ff43ccb22d.png)
![customer](https://user-images.githubusercontent.com/105041834/202249878-3db7ead0-41b1-450e-bb1e-69dffcebfdf9.png)
![chart](https://user-images.githubusercontent.com/105041834/202249881-0308e5c3-d3e8-4ce7-a59d-b36afa263f3c.png)
![chart_song_list](https://user-images.githubusercontent.com/105041834/202249883-3fe3b2f8-5455-4676-97e1-7643b81fa98f.png)
</details>

<!-- Transaction atomicity -->
## Transaction Atomicity
Transaction Atomicity was preserved using rollback and commit.
<details>
<summary>Example</summary>

- Example
```
mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level ...");
mysqli_query($connect, "start transaction");

...

# if correct
mysqli_query( $connect, "commit" );
# if not correct
mysqli_query( $connect, "rollback" );
```
</details>

<!-- Transaction isolation level -->
## Transaction Isolation Level
Selection of isolation level per table.
<details>
<summary>details</summary>

- Fee_Policy : serializable
- Customer : serializable
- Playlist : repeatable read
- Play_Song_List : repeatable read
- Song : serializable
- Chart_Song_List : serializable
- Chart : serializable
</details>


<!-- WHAT I LEARNED -->
## What I Learned

- DB modeling
  - 처음부터 끝까지 DB의 설계, 구현 과정에서 SQL을 다루는 능력, 
  - 
  - 

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo_name.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo_name.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo_name.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo_name.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo_name.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/linkedin_username
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
