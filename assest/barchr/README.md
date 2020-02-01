# barchartjs
#### A customizable bar chart generator using jQuery

## Table of contents
  * [About](#about)
  * [Usage](#usage)
  * [Example](#example)
  * [Try It](#try-it)
  * [API Documentation](#api-documentation)
    * [data parameter](#data-parameter)
    * [element parameter](#element-parameter)
    * [options parameter](#options-parameter)
  * [Known issues / bugs](#known-issues-/-bugs)
  * [Upcoming features](#upcoming-features)
  * [External resources used](#external-resources-used)

## About
barchartjs is a Javascript/jQuery library that converts your data into (hopefully) appealing charts. Simple to use with many customizable features.

## Usage
Add ```barchart.js``` and ```barchart.css``` to your project folder.
Include them and as well as jQuery in your html.
```html
<head>
  <!-- Include barchart CSS -->
  <link rel="stylesheet" href="barchart.css">
</head>
<body>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- Include barchart script -->
  <script src="barchart.js"></script>
</body>
```
**Note:** Be sure to load jQuery and the barchart files before your own css/js files.

Generate a barchart using the ```createBarChart``` function:
```javascript
createBarChart(data, element, options);
```

* ```data```
  * An array of arrays including the labels for the x-axis and their values.
* ```element```
  * The DOM or jQuery element that the chart will be rendered into.
* ```options```
  * An object containing the various options for the bar chart including the title, font colors, axis colors, etc.

## Example
#### Javascript
```javascript
const chart1 = $('#chart-container-1');
const data = [
  ['Apples', 11],
  ['Oranges', 24],
  ['Pears', 18]
];
const options = {
  title: 'Fruits',
  width: 560,
  height: 400,
  title: 'Fruits',
  titleFontSize: 30,
  valColors: ['white'],
  barColors: ['darkred', 'orange', '#c9cf1f'],
  labelPos: 'center',
  axisColor: 'black',
  barSpacing: 0.6,
  ticks: 6
};

createBarChart(data, chart1, options);
```

#### Output
The above usage results in the chart below:

![Barchart Example](assets/barchart-example.gif)
## Try It
To try this library, first clone this repository using ```git clone https://github.com/bryce-mcmath/barchartjs.git``` and then open the index.html file in your browser. Then you can edit the test.js file to create charts or edit the existing ones. Enjoy! It's also hosted on github pages [here.](https://bryce-mcmath.github.io/barchart)

## API Documentation
### *data* parameter
The *data* array should be filled with n arrays, each of length 2. The first index in each couplet should be a string representing the label name, the second index should be the numeric value associated that label. For an example, see [above.](#example)

### *element* parameter
The *element* parameter should be either a singular DOM or jQuery element.

### *options* parameter
The below table shows the available keys for the *options* object and their usage

|      Key      |  Description  |  Format  |  Default  |
| --- | --- | --- | --- |
|     width     | Determines the width of the overall chart container in pixels | Number | 320 |
|     height    | Determines the height of the overall chart container in pixels | Number | 320 |
|     title     | The title displayed on the chart | String | 'Bar Chart' |
|     titleFontSize     | Controls the font size of the title in pixels | Number | 18 |
|     titleColor     | Controls the font color of the title | String | 'black' |
|     titleBG     | Controls the background color of the title | String | '#f7f7f7' |
|     chartBG     | Controls the background color of the chart | String | '#fff' |
|     barColors     | Controls the colors of the bars, the nth color corresponding to the nth data entered | Array of strings | ['grey'] |
|     valColors     | Controls the font colors of the value on the bars, the nth color corresponding to the nth data entered | Array of strings | ['black'] |
|     labelColors     | Controls the font colors of the labels along the x-axis, the nth color corresponding to the nth data entered | Array of strings | ['black'] |
|     valPos     | Controls the position of the values on the bars, placing them at either the top, center, or bottom of the bars | String - either 'top', 'center', or 'bottom' | 'center' |
|     axisColor     | Controls the colors of the axes | String | 'black' |
|     axisWidth     | Controls the thickness of the axes | String | 'black' |
|     barSpacing     | Controls the space between the bar, the smaller the number the larger the space | Number - optimally between 0.4 and 0.8 | 0.6 |
|     ticks     | Controls the number of ticks along the y-axis | Number - optimally between 3 and 10 | 4 |
|     decimals    | Controls the number of shown decimals in both the displayed values and ticks | Number - optimally between 0 and 2 | 0 |

For the barColors, valColors, and labelColors arrays, if too few colors are in the given array, the remaining bars will be given the color at the first index. Eg if there are three bars, and the barColors array is ['blue', 'green'] then both the first and third bar will be colored blue.

The *options* object can be omitted entirely and the default styles will be used.

## Known issues / bugs
* Input values in the options object that are much too large or small as well as values that don't follow the documentation can break the chart
* If a bar is too short the value label can overflow
* The first tick is always a pixel higher than it should be
* Very large numbers made up of all 9s are sometimes converted to scientific notation

## Upcoming features
* Rewrite using only vanilla JS (bootcamp requested I use jQuery as an exercise)
* Allow multiple values per bar
* Additional options, including units along the y-axis and an option to turn off the animation
* If you have any other suggestions please feel free to make a pull request

## External resources used
* Started with this [gist](https://gist.github.com/daegren/24a18989683213fe6fb934fc4f789db4)
* Brad Traversy's HTML/CSS [Udemy course](https://www.udemy.com/course/modern-html-css-from-the-beginning/)
* Jonas Schmedtmann's Javascript [Udemy course](https://www.udemy.com/course/the-complete-javascript-course/)
* This [guide](https://guides.github.com/features/mastering-markdown/) to READMEs from Github
* Other existing READMEs
* [MDN Documentation](https://developer.mozilla.org/en-US/) for CSS selectors
* [jQuery Documentation](https://api.jquery.com/)
* [This Stack Overflow question](https://stackoverflow.com/questions/384286/javascript-isdom-how-do-you-check-if-a-javascript-object-is-a-dom-object/384380) for checking if an input is a DOM element on older browsers
