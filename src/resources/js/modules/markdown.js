// var MarkdownIt = require('markdown-it');
const markdownIt = require('markdown-it');

markdown = new markdownIt({
  html: false,
  xhtmlOut: false,
  breaks: true,
  langPrefix: 'language-',
  linkify: true,
  typographer: true,
  quotes: '“”‘’',
  highlight: function (/*str, lang*/) { return ''; }
});

