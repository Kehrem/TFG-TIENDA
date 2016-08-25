window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));


twttr.widgets.createTimeline({
  sourceType: "profile",
  screenName: "fog1furan"
},
document.getElementById('main'),
{
  width: '450',
  height: '700',
  related: 'fog1furan'
}).then(function (el) {
  console.log("Embedded a timeline.")
});



/*
twttr.widgets.createFollowButton(
  'fog1furan',
  document.getElementById('main'),
  {
    size: 'large'
  }
);*/

/*
twttr.widgets.createMentionButton(
  "TwitterDev",
  document.getElementById("main"),
  {
    size:"large"
  }
);*/
/*
twttr.widgets.createHashtagButton(
  "TwitterStories",
  document.getElementById("main"),
  {
    size:"large"
  }
);*/