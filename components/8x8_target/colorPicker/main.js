(function () {
    $(document).ready(function () {
        var blue10, blueDark, count, green10, greenDark, purple10, purpleDark, orangeDark, orange10, red10, redDark, resetAllSubs, transformation;
        count = 0;
        // Colors
        blue10 = "rgba(0, 168, 255, .1)";
        red10 = "rgba(255, 96, 95, .1)";
        green10 = "rgba(150, 209, 0, .1)";
        purple10 = "rgba(208, 102, 250, .1)";
        orange10 = "rgba(255, 102, 0, .1)";
        blueDark = "rgba(0, 94, 142, 1)";
        redDark = "rgba(155, 3, 0, 1)";
        greenDark = "rgba(74, 103, 0, 1)";
        purpleDark = "rgba(110, 49, 134, 1)";
        orangeDark = "rgba(255, 142, 66, 1)";
        $(".blue").on("mouseover", function () {
            resetAllSubs();
            $(".blueSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            // $("body").css({
            //     "background": blue10,
            //     "transition-delay": "0s"
            // });

            return $(".shadowBox").css({
                "background": blueDark,
                "transition-delay": "0s"
            });

        });
        $(".red").on("mouseover", function () {
            resetAllSubs();
            $(".redSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            // $("body").css({
            //     "background": red10,
            //     "transition-delay": "0s"
            // });

            return $(".shadowBox").css({
                "background": redDark,
                "transition-delay": "0s"
            });

        });
        $(".green").on("mouseover", function () {
            resetAllSubs();
            $(".greenSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            // $("body").css({
            //     "background": green10,
            //     "transition-delay": "0s"
            // });

            return $(".shadowBox").css({
                "background": greenDark,
                "transition-delay": "0s"
            });

        });
        $(".orange").on("mouseover", function () {
            resetAllSubs();
            $(".orangeSub").css({
                "opacity": "1",
                "transition-delay": "0s"
            });

            // $("body").css({
            //     "background": orange10,
            //     "transition-delay": "0s"
            // });

            return $(".shadowBox").css({
                "background": orangeDark,
                "transition-delay": "0s"
            });

        });
        $(".blue").on("click", function () {
            if (count > 1) {
                count = 0;
            }
            transformation("blue");
            return count += 1;
        });
        $(".red").on("click", function () {
            if (count > 1) {
                count = 0;
            }
            transformation("red");
            return count += 1;
        });
        $(".green").on("click", function () {
            if (count > 1) {
                count = 0;
            }
            transformation("green");
            return count += 1;
        });
        $(".orange").on("click", function () {
            if (count > 1) {
                count = 0;
            }
            transformation("orange");
            return count += 1;
        });
        resetAllSubs = function () {
            $(".blueSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            $(".redSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            $(".greenSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

            return $(".orangeSub").css({
                "opacity": "0",
                "transition-delay": "0s"
            });

        };
        return transformation = function (layer) {
            if (count === 0) {
                switch (layer) {
                    case "blue":
                        //Divs
                        $(".blue").css({
                            "z-index": "3",
                            "width": "304px",
                            "height": "112px",
                            "margin-top": "8px",
                            "margin-left": "8px",
                            "transition-delay": ".25s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".025s"
                        });

                        $(".red").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".05s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0375s"
                        });

                        $(".green").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".075s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0625s"
                        });

                        $(".orange").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".1s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0875s"
                        });

                        //Texts
                        $(".blue .colorName").css({
                            "opacity": "1",
                            "transition-delay": ".375s"
                        });

                        $(".blue .hex").css({
                            "opacity": "1",
                            "transition-delay": ".2s"
                        });

                        $(".blue .rgb").css({
                            "opacity": "1",
                            "transition-delay": ".425s"
                        });

                        break;
                    case "red":
                        //Divs
                        $(".red").css({
                            "z-index": "3",
                            "width": "304px",
                            "height": "112px",
                            "margin-top": "8px",
                            "margin-left": "8px",
                            "transition-delay": ".25s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".025s"
                        });

                        $(".blue").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".05s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0375s"
                        });

                        $(".green").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".075s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0625s"
                        });

                        $(".orange").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".1s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0875s"
                        });

                        //Texts
                        $(".red .colorName").css({
                            "opacity": "1",
                            "transition-delay": ".375s"
                        });

                        $(".red .hex").css({
                            "opacity": "1",
                            "transition-delay": ".2s"
                        });

                        $(".red .rgb").css({
                            "opacity": "1",
                            "transition-delay": ".425s"
                        });

                        break;
                    case "green":
                        //Divs
                        $(".green").css({
                            "z-index": "3",
                            "width": "304px",
                            "height": "112px",
                            "margin-top": "8px",
                            "margin-left": "8px",
                            "transition-delay": ".25s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".025s"
                        });

                        $(".blue").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".05s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0375s"
                        });

                        $(".red").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".075s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0625s"
                        });

                        $(".orange").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".1s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0875s"
                        });

                        //Texts
                        $(".green .colorName").css({
                            "opacity": "1",
                            "transition-delay": ".375s"
                        });

                        $(".green .hex").css({
                            "opacity": "1",
                            "transition-delay": ".2s"
                        });

                        $(".green .rgb").css({
                            "opacity": "1",
                            "transition-delay": ".425s"
                        });

                        break;
                    case "orange":
                        //Divs
                        $(".orange").css({
                            "z-index": "3",
                            "width": "304px",
                            "height": "112px",
                            "margin-top": "8px",
                            "margin-left": "8px",
                            "transition-delay": ".25s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".025s"
                        });

                        $(".blue").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".05s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0375s"
                        });

                        $(".red").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".075s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0625s"
                        });

                        $(".green").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".1s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(0)",
                            "transition-delay": ".0875s"
                        });

                        //Texts
                        $(".orange .colorName").css({
                            "opacity": "1",
                            "transition-delay": ".375s"
                        });

                        $(".orange .hex").css({
                            "opacity": "1",
                            "transition-delay": ".2s"
                        });

                        $(".orange .rgb").css({
                            "opacity": "1",
                            "transition-delay": ".425s"
                        });
                }


            }
            if (count === 1) {
                switch (layer) {
                    case "blue":
                        //Divs
                        $(".blue").css({
                            "z-index": "2",
                            "width": "64px",
                            "height": "64px",
                            "margin-top": "32px",
                            "margin-left": "32px",
                            "transition-delay": ".25s"
                        });

                        $(".blueSub").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".2s"
                        });

                        $(".red").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".45s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4375s"
                        });

                        $(".green").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".465s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4625s"
                        });

                        $(".orange").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".5s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4875s"
                        });

                        //Texts
                        $(".blue .colorName").css({
                            "opacity": "0",
                            "transition-delay": ".075s"
                        });

                        $(".blue .hex").css({
                            "opacity": "0",
                            "transition-delay": ".05s"
                        });

                        return $(".blue .rgb").css({
                            "opacity": "0",
                            "transition-delay": "0s"
                        });

                    case "red":
                        //Divs
                        $(".red").css({
                            "z-index": "2",
                            "width": "64px",
                            "height": "64px",
                            "margin-top": "32px",
                            "margin-left": "32px",
                            "transition-delay": ".25s"
                        });

                        $(".redSub").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".2s"
                        });

                        $(".blue").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".45s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4375s"
                        });

                        $(".green").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".465s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4625s"
                        });

                        $(".orange").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".5s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4875s"
                        });

                        //Texts
                        $(".red .colorName").css({
                            "opacity": "0",
                            "transition-delay": ".075s"
                        });

                        $(".red .hex").css({
                            "opacity": "0",
                            "transition-delay": ".05s"
                        });

                        return $(".red .rgb").css({
                            "opacity": "0",
                            "transition-delay": "0s"
                        });

                    case "green":
                        //Divs
                        $(".green").css({
                            "z-index": "2",
                            "width": "64px",
                            "height": "64px",
                            "margin-top": "32px",
                            "margin-left": "128px",
                            "transition-delay": ".25s"
                        });

                        $(".greenSub").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".2s"
                        });

                        $(".blue").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".45s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4375s"
                        });

                        $(".red").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".465s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4625s"
                        });

                        $(".orange").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".5s"
                        });

                        $(".orangeSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4875s"
                        });

                        //Texts
                        $(".green .colorName").css({
                            "opacity": "0",
                            "transition-delay": ".075s"
                        });

                        $(".green .hex").css({
                            "opacity": "0",
                            "transition-delay": ".05s"
                        });

                        return $(".green .rgb").css({
                            "opacity": "0",
                            "transition-delay": "0s"
                        });

                    case "orange":
                        //Divs
                        $(".orange").css({
                            "z-index": "2",
                            "width": "64px",
                            "height": "64px",
                            "margin-top": "32px",
                            "margin-left": "224px",
                            "transition-delay": ".25s"
                        });

                        $(".orangeSub").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".2s"
                        });

                        $(".blue").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".45s"
                        });

                        $(".blueSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4375s"
                        });

                        $(".red").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".465s"
                        });

                        $(".redSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4625s"
                        });

                        $(".green").css({
                            "opacity": "1",
                            "transform": "scale(1)",
                            "transition-delay": ".5s"
                        });

                        $(".greenSub").css({
                            "opacity": "0",
                            "transform": "scale(1)",
                            "transition-delay": ".4875s"
                        });

                        //Texts
                        $(".orange .colorName").css({
                            "opacity": "0",
                            "transition-delay": ".075s"
                        });

                        $(".orange .hex").css({
                            "opacity": "0",
                            "transition-delay": ".05s"
                        });

                        return $(".orange .rgb").css({
                            "opacity": "0",
                            "transition-delay": "0s"
                        });
                }


            }
        };
    });

}).call(this);


  //# sourceURL=coffeescript