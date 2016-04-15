<article class="starwars">
  <audio preload="auto">
    <source src="http://s.cdpn.io/1202/Star_Wars_original_opening_crawl_1977.ogg" type="audio/ogg" />
    <source src="http://s.cdpn.io/1202/Star_Wars_original_opening_crawl_1977.mp3" type="audio/mpeg" />
  </audio>

  <div class="animation">

  <section class="intro">
    A long time ago, in a Warhammer 40K galaxy far,<br> far away....
  </section>

  <section class="titles">
    <div contenteditable="true" spellcheck="false">
      <p>
        Environ 60 000 000 d'années
        avant la naissance de l'Empereur :
        Les Nécrons sont en guerre
        contre les Anciens, on peut
        supposer que se sont ces
        derniers qui ont créé les
        Humains, les Orks, les
        Eldars et bien d'autres
        encore pour les défendre
        contre les Nécrons.
      </p>

      <p>
        Pendant ce temps les Nécrons
        se battent au nom de leur dieux :
        les C'tans, puis après la
        destruction de plusieurs
        C'tans, les Nécrons construisent
        des stases-biomécaniques
        gigantesques, sortes de
        sarcophages de protection,
        pour protéger leurs esprits
        et leur permettre de survivre
        à un cataclysme menaçant
        leur existence.
      </p>

      <p>
       Il est
      probable que ce soient
      les C'tans qui aient
      déclenché cette catastrophe.
      Certaines races restent encore
      à découvrir et pourraient
      détruire l'humanité.
      </p>
      </div>
  </section>

  <section class="logo" >
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" width="264" height="500">
        <path class="top-of-the-skull" fill="#F00" stroke="#F00" stroke-width="2" d="M44,70L52,40 89,33 99,9 175,28 183,51 208,51 221,96 217,99 176,97 168,147 155,137 148,169 125,133 107,170 96,143 88,151 87,101Z" />
        <circle class="left-eye" fill="#fff" stroke="#fff" stroke-width="2" cx="113" cy="72" r="17" />
        <path class="right-eye" fill="#fff" stroke="#fff" stroke-width="2" d="M149,77 174,64Q187,65 184,81L149,83Z" />
        <path class="nose" fill="#f00" stroke="#f00" stroke-width="2" d="M127,112 134,91 145,111Z" />
        <path class="jaw" fill="#f00" stroke="#f00" stroke-width="2" d="M43,192L68,108 83,176, 93,163, 108,189, 128,149 154,195 162,155 181,179 203,127 213,202 133,255Z" />
        <path class="bone-1" fill="#f00" stroke="#f00" stroke-width="2" d="M43,348 209,309 214,296 225,290 235,302 228,315 237,327 225,335 211,329 45,368 36,378 23,376 24,370 30,365 18,353 22,345 29,343z" />
        <path class="bone-1" fill="#f00" stroke="#f00" stroke-width="2" d="M50,298 224,403 228,415 242,415 246,410 240,400 248,399 252,396 252,386 233,385 53,280 52,270 48,264 35,265 33,268 40,282 30,282 26,290 30,296 35,296z" />
      </svg>
  </section>
  </div>
</article>

<script>
/*
 * Star Wars opening crawl from 1977
 *
 * I freaking love Star Wars, but could not find
 * a web version of the original opening crawl from 1977.
 * So I created this one.
 *
 * I wrote an article where I explain how this works:
 * http://timpietrusky.com/star-wars-opening-crawl-from-1977
 *
 * Watch the Start Wars opening crawl on YouTube.
 * http://www.youtube.com/watch?v=7jK-jZo6xjY
 *
 * Stuff I used:
 * - CSS (animation, transform)
 * - HTML audio (the opening theme)
 * - SVG (the Star Wars logo from wikimedia.org)
 *   http://commons.wikimedia.org/wiki/File:Star_Wars_Logo.svg
 * - JavaScript (to sync the animation/audio)
 *
 * Thanks to Craig Buckler for his amazing article
 * which helped me to create this remake of the Star Wars opening crawl.
 * http://www.sitepoint.com/css3-starwars-scrolling-text/
 *
 * Sound copyright by The Walt Disney Company.
 *
 *
 * 2013 by Tim Pietrusky
 * timpietrusky.com
 *
 */
StarWars = (function() {

  /*
   * Constructor
   */
  function StarWars(args) {
    // Context wrapper
    this.el = $(args.el);

    // Audio to play the opening crawl
    this.audio = this.el.find('audio').get(0);

    // Start the animation
    this.start = this.el.find('.start');

    // The animation wrapper
    this.animation = this.el.find('.animation');

    // Remove animation and shows the start screen
    this.reset();

    // Start the animation on click
    this.start.bind('click', $.proxy(function() {
      this.start.hide();
      this.audio.play();
      this.el.append(this.animation);
    }, this));

    // Reset the animation and shows the start screen
    $(this.audio).bind('ended', $.proxy(function() {
      this.audio.currentTime = 0;
      this.reset();
    }, this));


      this.start.hide();
      this.audio.play();
      this.el.append(this.animation);


}

  /*
   * Resets the animation and shows the start screen.
   */
  StarWars.prototype.reset = function() {
    this.start.show();
    this.cloned = this.animation.clone(true);
    this.animation.remove();
    this.animation = this.cloned;
  };

  return StarWars;
})();

new StarWars({
  el : '.starwars'
});
</script>
