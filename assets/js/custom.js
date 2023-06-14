$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({
    pageNotFound : 'error_404'
  }); // initialize

  // define routes
  app.route({
    view: 'about',
    load: "about.html"  
  });
  app.route({
    view: 'faq',
    load: "faq.html"  
  });
  app.route({
    view: 'features',
    load: "features.html"  
  });
  app.route({
    view: 'hero',
    load: "hero.html"  
  });
  app.route({
    view: 'test',
    load: "test.html"  
  });
  app.route({
    view: 'types',
    load: "types.html"  
  });

  // run app
  app.run();

});

/*
$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize

  // define routes
  app.route({
    view: 'view_1',
    onCreate: function() { $("#view_1").append($.now()+': Written on create<br/>'); },
    onReady: function() { $("#view_1").append($.now()+': Written when ready<br/>'); }
  });
  app.route({view: 'view_2', load: 'view_2.html' });
  app.route({
    view: 'view_3', 
    onCreate: function() { $("#view_3").append("I'm the third view"); }
  });

  // run app
  app.run();

});
*/