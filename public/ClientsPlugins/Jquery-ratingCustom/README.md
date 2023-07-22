
<div id="top"></div>
<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![stars][stars]

A jQuery plugin that adds a rating system to HTML markup compatible with form submission.
The plugin supports different shapes, custom sizes, different shapes and the number of shapes.

<p align="right">(<a href="#top">back to top</a>)</p>




### Built With

* [JQuery](https://jquery.com)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Getting started is easy.
Clone or download the repository and link the plugin script to your project to your project. Call the method on the id of a div element that you want to see the ratings system and your rating system will appear. The element that you call the .rates method on will have an input form appended to it with a class and name with a suffix of 'Rating' appended to it. For example, if the method is called on a div with the ID of "score" an <input> element with the id and name of "scoreRating" will be generated that can be used in form submissions.
  
See the installation and usage sections for the specific details.

### Installation

1. Download or clone the repo and place the contents, the css, images and js folders in your project root directory. If you cannot places the images folder in the root directory due to a limitation of your project, you can edit the path of the images using the settings of the plugin in the method call. For example, if you have a folder named 'static' in your root directory and your images folder is inside of it in order to indicate the images location you can use the 'imagesFolderLocation' setting and set it to 'static/' like in the following:<br/><br/>
  ![image](https://user-images.githubusercontent.com/84114638/143951899-1b201535-300d-41e7-9635-bfc23b765175.png)
  
    This will point the plugin to the location of the folder and images necessary for the plugin.

2. Link jQuery to your html file and add the rates script file to your project as well:<br/><br/>
![scripts](https://user-images.githubusercontent.com/84114638/143790539-3a0ce527-06c4-43d4-9b66-a7b4297a260e.png)
  

3. Link the rates.css file to your html file: <br/><br/>
![image](https://user-images.githubusercontent.com/84114638/143952875-7b9c973f-6584-4214-9abe-ad9ea900facd.png)


<p align="right">(<a href="#top">back to top</a>)</p>


<!-- USAGE EXAMPLES -->
## Usage

1. Create an html tag and add an ID to target the element like in the following example: <br />
![sample1](https://user-images.githubusercontent.com/84114638/143790472-ea4792e9-841a-4a3f-9bbd-4d5c08fb0d43.png)
2. In the scripts tag of your html file or the external .js script file, call the .rates method on the element where you want to generate the rating system.
3. If no settings are given then a set of five 25 pixel-sized white stars that turn yellow when hovered over. 
4. Clicking on a star will set the rating to the corresponding star. 
5. The settings can be edited like the following: shadeColor can be set as either 'red' or 'yellow' to set the fill-in color, starCount can be set as an integer and sets how many shapes are to appear. The shape can be set as 'black-star', 'white-star', 'black-heart', and 'white-heart' and alters the shapes of the rating. <br/>
![settings1](https://user-images.githubusercontent.com/84114638/143791415-69a6719a-dff6-48a2-a899-7d419d0a76e2.png) <br/>
6. For example the above settings will create a set that looks like the following: <br/>
![results1](https://user-images.githubusercontent.com/84114638/143791161-3d70c598-0960-4abc-a1b5-a01aeafca9b6.png)


<p align="right">(<a href="#top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
[stars]: https://user-images.githubusercontent.com/84114638/143788850-11921f98-c9a7-445a-a6b7-0c1bd0e18ad0.png




