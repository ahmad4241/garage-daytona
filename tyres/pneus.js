/* fixed layers must live on <body>: Elementor wrappers can break position:fixed */
(function(){var h=document.getElementById("gd-pneus");if(!h)return;var w=document.createElement("div");w.id="gd-pneus";w.className="gdp-layers";["drawer","scrim","sticky"].forEach(function(id){var e=document.getElementById(id);if(e)w.appendChild(e)});document.body.appendChild(w)})();
window.BOOKING_ENDPOINT="/wp-json/garagedaytona/v1/pneus-reservation";

(function(){
"use strict";
/* ---------------- Example stock (to be replaced by the garage's real list) ---------------- */
const PHOTOS={"D-0001":{hero:"/wp-content/uploads/pneus/img/D-0001-hero.webp","lq":"data:image/webp;base64,UklGRswAAABXRUJQVlA4IMAAAADwBACdASoUABQAPu1urlIppiQiqAgBMB2JQBf9sZtMzUxTRfQzETDHeYu0Eg6UG5gA/t1b4XUWTX1PtPeyYrgIRfh8EEnrmhpCmZyYyhpU5agOr605olAS9m+Bf6Srm79Q6DeMtoQGpFtGMDQdMqgxaewpgHGbiBuoO9NtClDQJtl60qxJw3M9czzf0FBzdOBOA3NBfo3SPAG6b+sGulXrwF3cmWWcAeF228wpvH/vSJiiV0O5F23GgOX2UHpNAAA=",gallery:["/wp-content/uploads/pneus/img/D-0001-1.webp", "/wp-content/uploads/pneus/img/D-0001-2.webp", "/wp-content/uploads/pneus/img/D-0001-3.webp", "/wp-content/uploads/pneus/img/D-0001-4.webp", "/wp-content/uploads/pneus/img/D-0001-5.webp"]},"D-0002":{"hero": "/wp-content/uploads/pneus/img/D-0002-hero.webp","lq":"data:image/webp;base64,UklGRsAAAABXRUJQVlA4ILQAAADQBACdASoUABQAPu1urlIppiQiqAgBMB2JQBg5sZjMzOfFBwkGUvA1fyIdXCGmAAD+5lIFg0bc/dhPr4ridH5EKF7fys8XjLHnY80Wb0SEyawAGe9dXv4T9g1ya9iKOCsNKEHmKsg+2tYJqxYRqs7mrGQDlgLbdDQ2miF41WWe7/+3HxJVeWCN7pfhBkbVXaBXinht1c7oK5Y0PnDBjZOWTZm3+f2RQXz6W5k48M3QAmjwAAA=", "gallery": ["/wp-content/uploads/pneus/img/D-0002-1.webp", "/wp-content/uploads/pneus/img/D-0002-2.webp", "/wp-content/uploads/pneus/img/D-0002-3.webp", "/wp-content/uploads/pneus/img/D-0002-4.webp", "/wp-content/uploads/pneus/img/D-0002-5.webp"]},"D-0003":{"hero": "/wp-content/uploads/pneus/img/D-0003-hero.webp","lq":"data:image/webp;base64,UklGRrwAAABXRUJQVlA4ILAAAAAwBQCdASoUABQAPu1urlIppiQiqAgBMB2JQBgbsYiMzafWpb+GQdx78N8cliIUcJ8JAAD+5lIFXHP6vMqt5BAs8jiP4QhJq0NH3c5wEhH3jFnTKl4TkdXv4SOw8e8O2LdCKCuULWzh4xWEzC5CJWhqbkdMgND3WjCPsnF5K4/WvX93uxHI0o1LCop8Zn8DkUw7RtbWmvVek3gH1vweeHAd6BU6wPoTWpCENrcuHnvAAA==", "gallery": ["/wp-content/uploads/pneus/img/D-0003-1.webp", "/wp-content/uploads/pneus/img/D-0003-2.webp", "/wp-content/uploads/pneus/img/D-0003-3.webp", "/wp-content/uploads/pneus/img/D-0003-4.webp", "/wp-content/uploads/pneus/img/D-0003-5.webp"]},"D-0004":{"hero": "/wp-content/uploads/pneus/img/D-0004-hero.webp","lq":"data:image/webp;base64,UklGRr4AAABXRUJQVlA4ILIAAADQBACdASoUABQAPu1ur1IppiQiqAgBMB2JQBfJAkTb9XiNeTW4ijlK30brUTSgAAD+5lIGOqLFjgzWlsx0gK/YmcvwCW+TXhzqUI6JmILt/Ow8sOr+M+FL4vOdq2JD0nC2FHybWtCsVY6/pMXH/ew9YFlpK0WkDjGwwq10+XTHObpu6AmNuDtvvFOpfb6eVtB0kPvkdhDJD4mTNxisq/faDetwfTiMPfOfXYTKdQBWjwAA", "gallery": ["/wp-content/uploads/pneus/img/D-0004-1.webp", "/wp-content/uploads/pneus/img/D-0004-2.webp", "/wp-content/uploads/pneus/img/D-0004-3.webp", "/wp-content/uploads/pneus/img/D-0004-4.webp", "/wp-content/uploads/pneus/img/D-0004-5.webp"]},"D-0005":{"hero": "/wp-content/uploads/pneus/img/D-0005-hero.webp","lq":"data:image/webp;base64,UklGRrwAAABXRUJQVlA4ILAAAACQBQCdASoUABQAPu1qqFAppaOiqA1RMB2JQBihW/DAawAbybvY6O4YuybcW8hiXw+YwgCuUAD+pszUnTzEUblPms66j7Hctj/d1EwN2HRp4w8Wsw4tN37pK8O3ZVrMRbWnohUEHsS4xsmd5FbReTfkrncqj2ycKUBEvyWgtPl9hmp6H0jvqogtVR3vOh4raWnz+XtMoyK44FAtGpDloMVIcfYvjQpUcr5XHkwFqX4AAA==", "gallery": ["/wp-content/uploads/pneus/img/D-0005-1.webp", "/wp-content/uploads/pneus/img/D-0005-2.webp", "/wp-content/uploads/pneus/img/D-0005-3.webp", "/wp-content/uploads/pneus/img/D-0005-4.webp", "/wp-content/uploads/pneus/img/D-0005-5.webp"]},"D-0006":{"hero":"/wp-content/uploads/pneus/img/D-0006-hero.webp","lq":"data:image/webp;base64,UklGRsoAAABXRUJQVlA4IL4AAAAQBQCdASoUABQAPu1srlIppaQiqAgBMB2JQBhs0AA2//WALfidcaXWFPrszU0euGgAAP7dW+Ji6WQSFmOCUyOoBu6QyntDAMkEc1lkA4ZY6sGhpIB2y/Wsoy/jOs4mo0iRPRb0B+vlK4i+zYpzi1UFwnW2Z95A1dakKB8xGGw5ho1mE/56PQN03dASplRrOANVJMVGSQbN088pIY77Pq/00kHUQIKHsGdoqsRfnGwirPXv9shULNXOJ1ALrRwA","gallery":["/wp-content/uploads/pneus/img/D-0006-1.webp","/wp-content/uploads/pneus/img/D-0006-2.webp","/wp-content/uploads/pneus/img/D-0006-3.webp","/wp-content/uploads/pneus/img/D-0006-4.webp","/wp-content/uploads/pneus/img/D-0006-5.webp"]},"D-0007":{"hero":"/wp-content/uploads/pneus/img/D-0007-hero.webp","lq":"data:image/webp;base64,UklGRsoAAABXRUJQVlA4IL4AAAAQBQCdASoUABQAPu1srlIppaQiqAgBMB2JQBfntgAXagFBz4N0xRzVymmXKPzqMuGAAP7dW+Ji6V33mJJ17Q6J6ZWJ4JkKJ3IDSiDCs7kJu5zPqHcIzK2SjMHi8wBDCVs8NbeguKYpRCC2kX/E+rbOzyfBWHQ8VRyP8CQhW3BNxpMCqJLDu0j7uxCi18docnIEUH4J/9baSpoAMKO/BqccLJy2WgmpI/7hMaGMrk/Sn/jPFmvWolf4Ai2wAAAA","gallery":["/wp-content/uploads/pneus/img/D-0007-1.webp","/wp-content/uploads/pneus/img/D-0007-2.webp","/wp-content/uploads/pneus/img/D-0007-3.webp","/wp-content/uploads/pneus/img/D-0007-4.webp","/wp-content/uploads/pneus/img/D-0007-5.webp"]},"D-0008":{"hero":"/wp-content/uploads/pneus/img/D-0008-hero.webp","lq":"data:image/webp;base64,UklGRr4AAABXRUJQVlA4ILIAAADQBACdASoUABQAPu1urlIppiQiqAgBMB2JQBg5sY7My9VvgBSSmT0Apn+FF4oGYAD+5lIFZ+1VvVA7iUbEML6bpj+VXgGRSv6Hck70RuBEJto4VftZtcxRrSWK2DNuKP96K6tNlc3uGaYjsJlcJs7pRtsHVV4CbY4RyCZFFfN1DH0ZvGkvLFShHcUMBYzaZ5UqpxN0PatLByPFqp5K4/Ri7wWrTEpmHUWtw+aIG80EHjgA","gallery":["/wp-content/uploads/pneus/img/D-0008-1.webp","/wp-content/uploads/pneus/img/D-0008-2.webp","/wp-content/uploads/pneus/img/D-0008-3.webp","/wp-content/uploads/pneus/img/D-0008-4.webp","/wp-content/uploads/pneus/img/D-0008-5.webp"]},"D-0009":{"hero":"/wp-content/uploads/pneus/img/D-0009-hero.webp","lq":"data:image/webp;base64,UklGRsAAAABXRUJQVlA4ILQAAADwBACdASoUABQAPu1ur1IppiQiqAgBMB2JQBg5gfBWqz8ZSLAO0uZJWq/+C80u7QAA/t1b4mLpXfeYknXtDnZQZ/K14ZucXKpGkbIdgc5zrnVQybmmI7OG6Wv/e+QwFrU6Z2m15M7+5wOC8Yq3dfG2hShoE3JkOZ8tB5FEUOhcuMB7XA37VXyyY3rUa3cXbLZ/ooyfiVkgN1Q3uqk/+yqzeZIg8Ieq52ipoJl42RzWHa0AAAA=","gallery":["/wp-content/uploads/pneus/img/D-0009-1.webp","/wp-content/uploads/pneus/img/D-0009-2.webp","/wp-content/uploads/pneus/img/D-0009-3.webp","/wp-content/uploads/pneus/img/D-0009-4.webp","/wp-content/uploads/pneus/img/D-0009-5.webp"]},"D-0010":{"hero":"/wp-content/uploads/pneus/img/D-0010-hero.webp","lq":"data:image/webp;base64,UklGRsAAAABXRUJQVlA4ILQAAAAQBQCdASoUABQAPu1ur1IppiQiqAgBMB2JQBf9ge6OzEB7m1JiGLNw/AsdtzYck6UAAP7mUgY6osGvqfae+TPaU3cLvIqhZ67C/jUppzxGh5N5dxI0+jhskpjxivS16rsB/0LUqMJUGs7kGvdsIWwSiys41VELVLkFfCrf2HPGqwzoEIyAyUnDP68l7VzUb5cNt0eR++XpIOpBAQdIBMqvdaLrib849nV6vLg8U2GBfgQ3mAA=","gallery":["/wp-content/uploads/pneus/img/D-0010-1.webp","/wp-content/uploads/pneus/img/D-0010-2.webp","/wp-content/uploads/pneus/img/D-0010-3.webp","/wp-content/uploads/pneus/img/D-0010-4.webp","/wp-content/uploads/pneus/img/D-0010-5.webp"]},"D-0011":{"hero":"/wp-content/uploads/pneus/img/D-0011-hero.webp","lq":"data:image/webp;base64,UklGRsYAAABXRUJQVlA4ILoAAAAwBQCdASoUABQAPu1urlIppiQiqAgBMB2JQBew6gKxZMzKI1JDxuBj1earcNYDAw0qAAD+5lIFdlun/VcOnwrRF430nDQnNvcJ3+iX2hfdfCiTo9rTzQm1UGBsfVgLOwi6jOzytOP3ue/716HHcrwXIDdAqeSf4HK1/BNs8tk0Y4ua92IfJZIgAOzvFMPAfBd1Wr4r8SpsQjxeA40isN6KHQB98sVuEu9zQDy62GMQqsQb7YQDjDYAAAA=","gallery":["/wp-content/uploads/pneus/img/D-0011-1.webp","/wp-content/uploads/pneus/img/D-0011-2.webp","/wp-content/uploads/pneus/img/D-0011-3.webp","/wp-content/uploads/pneus/img/D-0011-4.webp","/wp-content/uploads/pneus/img/D-0011-5.webp"]},"D-0012":{"hero":"/wp-content/uploads/pneus/img/D-0012-hero.webp","lq":"data:image/webp;base64,UklGRsYAAABXRUJQVlA4ILoAAAAwBQCdASoUABQAPu1qqVAppiOiqA1RMB2JQBjVagNQAMXAuvdbTHnnsGEaudRarQkSMAD+5lIGG567Hu29YDh4n4EmVoYWVoGngivFVNprMBTdHnQ6UQHSoXnslExB19DsH5mTbaO4SDrxn+NlNyUJ6QD1w4LQyXaC/x8eRT7K/UocKQm9NBtruHTjsBbKXA8+3b+BDMNFb0CEq0QcXKgE7G79QOynoJWw9uu5408zMazx6H5ik0AAAAA=","gallery":["/wp-content/uploads/pneus/img/D-0012-1.webp","/wp-content/uploads/pneus/img/D-0012-2.webp","/wp-content/uploads/pneus/img/D-0012-3.webp","/wp-content/uploads/pneus/img/D-0012-4.webp"]},"D-0013":{"hero":"/wp-content/uploads/pneus/img/D-0013-hero.webp","lq":"data:image/webp;base64,UklGRsIAAABXRUJQVlA4ILYAAABwBQCdASoUABQAPu1sqlGppaOiqAqpMB2JQBjVeBKxUMzQ96GLUjlYqtS700N7abizcImOAP7mUgV2Woz9Vw6fCawJ2532vCcbtwna6PBeHPuT7D4UY9r6TIbvLWdsvFX5+TPDsyY9Jt4joz4WoLiPXRfnic/eOjA+O7fEU5QKwgc6+cE91lQxRFXwgbctuMpSUNeOUtXawW7muiqVdJmvDdyq1G9x+AprYuVmN1uAopSKp6xAAA==","gallery":["/wp-content/uploads/pneus/img/D-0013-1.webp","/wp-content/uploads/pneus/img/D-0013-2.webp","/wp-content/uploads/pneus/img/D-0013-3.webp","/wp-content/uploads/pneus/img/D-0013-4.webp","/wp-content/uploads/pneus/img/D-0013-5.webp"]},"D-0014":{"hero":"/wp-content/uploads/pneus/img/D-0014-hero.webp","lq":"data:image/webp;base64,UklGRsIAAABXRUJQVlA4ILYAAABQBQCdASoUABQAPu1srlIppaQiqAgBMB2JQBig8dAaagjwKL3EbyR3gTPeGIdSql9td0AA/uZSBjqiwa+p9p75M9jmAeLljdhm5xdFCtFgpvZJvf+F1ayqqXcBFp0rScTBC7xd6kz6wctc967OKUMHZCS00Ck+UuTqfTgHe+Ld44Du77bS+xEmbWwdEVLY83QTk2abPOTKq5Y0PnJF5Cs4DWzb/QkxRSbUxiA5FBKBSKpDIAAAAA==","gallery":["/wp-content/uploads/pneus/img/D-0014-1.webp","/wp-content/uploads/pneus/img/D-0014-2.webp","/wp-content/uploads/pneus/img/D-0014-3.webp","/wp-content/uploads/pneus/img/D-0014-4.webp","/wp-content/uploads/pneus/img/D-0014-5.webp"]},"D-0015":{"hero":"/wp-content/uploads/pneus/img/D-0015-hero.webp","lq":"data:image/webp;base64,UklGRsgAAABXRUJQVlA4ILwAAABQBQCdASoUABQAPu1sq1EppaOiqAqpMB2JQBkCYAKxKMzHmTQ967KbfMk1eZClRcyrn8AA/uZSBXZZIj1UhZz4GmCFlfoAXwxbdWmBNbLvzq2GvuPb7QZm2733PgX+XHB0usmTUmvaO0INetdsyDxB3pIUBc7CvNwme4nh7KNmf0j6XFG9wARoMioO/RF1ht+8yhyUxDXh98+Rohkh8UZqGMdk4J5N4k8vXtE23zNLeVze6W8igC01UN4gAA==","gallery":["/wp-content/uploads/pneus/img/D-0015-1.webp","/wp-content/uploads/pneus/img/D-0015-2.webp","/wp-content/uploads/pneus/img/D-0015-3.webp","/wp-content/uploads/pneus/img/D-0015-4.webp","/wp-content/uploads/pneus/img/D-0015-5.webp"]},"D-0016":{"hero":"/wp-content/uploads/pneus/img/D-0016-hero.webp","lq":"data:image/webp;base64,UklGRroAAABXRUJQVlA4IK4AAAAQBQCdASoUABQAPu1urlKppiQiqAgBMB2JQBghdAKxAMzAq9dKA5qQTD1K3KmRgoPAAP7mUgV2WEv9UsCK2VtgX8xbz9EGTa2uFNlShD99R8XFmky/7Hg2bTmOvXdxaZ2GohnUCT/Lu3qsgm/Qk9km9XcXnYVwA2Ac6h6oFQ6Jahm6BDs1pjlJ0i5L+AIEe5Y0PnCbCrEeMVAHKFJmVngFFLl+c2Hg7eGCgz/bAAA=","gallery":["/wp-content/uploads/pneus/img/D-0016-1.webp","/wp-content/uploads/pneus/img/D-0016-2.webp","/wp-content/uploads/pneus/img/D-0016-3.webp","/wp-content/uploads/pneus/img/D-0016-4.webp","/wp-content/uploads/pneus/img/D-0016-5.webp"]},"D-0017":{"hero":"/wp-content/uploads/pneus/img/D-0017-hero.webp","lq":"data:image/webp;base64,UklGRsQAAABXRUJQVlA4ILgAAABwBQCdASoUABQAPu1urlIppiQiqAgBMB2JQBg/YAlQHfVHkOcEm7EtCCjcoNUIgbJwQmwAAP7mUgWDRtz92E+viuJmJ5jMsTGRYSn46YXWDbWJlxDCIAuVWOko/RtboVqyUyus8n5mLixLBpwAYAnzWyDyzFd+sd4O396DoS417IAx4cv0q/hArVxPhy6I1f+nFhP4/Ca0n8jf1QcdCOuha2KPf9SWpbERGptFrUEycG7ho/D6U8AA","gallery":["/wp-content/uploads/pneus/img/D-0017-1.webp","/wp-content/uploads/pneus/img/D-0017-2.webp","/wp-content/uploads/pneus/img/D-0017-3.webp","/wp-content/uploads/pneus/img/D-0017-4.webp","/wp-content/uploads/pneus/img/D-0017-5.webp"]},"D-0018":{"hero":"/wp-content/uploads/pneus/img/D-0018-hero.webp","lq":"data:image/webp;base64,UklGRsYAAABXRUJQVlA4ILoAAAAQBQCdASoUABQAPu1urlIppiQiqAgBMB2JQBdl4AKxUMzKHJAIsoU7qi5NSQttjD6AAP7mUgV2Woz9Vw6fCawPlnnSF7fP7vDLuXZqpP+EUE1GAbPQjF8Ve8TqmQ9i1XOb3Y7Kg0WQenPniuaG4pGffH7+akikOXsk3qKO52JUoJPsPNM5zTixGBOyQefHayMZ6MevJcpqZVOza7JTKtfX6jVgeSufeZlWmU9V53KUm6rIYdDlsQjpgAA=","gallery":["/wp-content/uploads/pneus/img/D-0018-1.webp","/wp-content/uploads/pneus/img/D-0018-2.webp","/wp-content/uploads/pneus/img/D-0018-3.webp","/wp-content/uploads/pneus/img/D-0018-4.webp","/wp-content/uploads/pneus/img/D-0018-5.webp"]},"D-0019":{"hero":"/wp-content/uploads/pneus/img/D-0019-hero.webp","lq":"data:image/webp;base64,UklGRsQAAABXRUJQVlA4ILgAAABQBQCdASoUABQAPu1qqFAppaOiqA1RMB2JQBig+pVwAUzxY+3lLmMaU/IM8tvrXHL1+AAA/uZSBjqiwa+p9p75M9unoHa7Zqx3Vpi1BjF5FSoL8zMP5qbCWT/JX4sIaF+fZK5HFqq/jHU12cUitG4OlPMfklOz+KtZc3c9n1Xt0B8f4Fvv6E3dFc5BvnA9OGctSWveYLC4T9h6D7YtjUxu6gz0x+WBDTWDLsIZhHk8DHpFHGBFm6AA","gallery":["/wp-content/uploads/pneus/img/D-0019-1.webp","/wp-content/uploads/pneus/img/D-0019-2.webp","/wp-content/uploads/pneus/img/D-0019-3.webp","/wp-content/uploads/pneus/img/D-0019-4.webp","/wp-content/uploads/pneus/img/D-0019-5.webp"]},"D-0021":{"hero":"/wp-content/uploads/pneus/img/D-0021-hero.webp","lq":"data:image/webp;base64,UklGRsAAAABXRUJQVlA4ILQAAADwBACdASoUABQAPu1urlIppiQiqAgBMB2JQBg5sZPMzUzqYBMvuC6iPg5Nv4LYWPAA/uZSBXZaYj1UhZz4LFutU3Afb5/d4ZVG5cxdTDf6Co109K9oPCnJVEteHoNYEaU6UJytNa18V1iR49cVt5UT8+RfAtt0NDYP0i+J8NZiwfYh8e8JHKjG9wfz+7ZU3i5qKLOhPfyQ/0J8F/6LQqTHy1oxibKK0u27dpQKT/AixAFLWAA=","gallery":["/wp-content/uploads/pneus/img/D-0021-1.webp","/wp-content/uploads/pneus/img/D-0021-2.webp","/wp-content/uploads/pneus/img/D-0021-3.webp","/wp-content/uploads/pneus/img/D-0021-4.webp"]},"D-0020":{"hero":"/wp-content/uploads/pneus/img/D-0020-hero.webp","lq":"data:image/webp;base64,UklGRrgAAABXRUJQVlA4IKwAAADQBACdASoUABQAPu1qqFAppiOiqA1RMB2JQBf9gfBKjGyXt2Oy3yceMqrDC7g4YAD+3VviZ3AsZHICUDBxKGKhr1l2e573n6P/VINTdQHtstDN3CAL4blErhlAMpAdHn33QRPYXQMqAaxOipCJ+TIAXRdQ6eTSdCzeBo6MMlY3T+CXK5LD2H1GluwJy5CD9G5PW7Rh0JlUbDFVAqBwJyf9aG79WjOdzaAI2AAA","gallery":["/wp-content/uploads/pneus/img/D-0020-1.webp","/wp-content/uploads/pneus/img/D-0020-2.webp","/wp-content/uploads/pneus/img/D-0020-3.webp","/wp-content/uploads/pneus/img/D-0020-4.webp","/wp-content/uploads/pneus/img/D-0020-5.webp"]}};
const TIRES=[
 {id:"D-0001",brand:"Continental",model:"WinterContact",season:"hiver",w:225,a:65,d:17,li:"102 T",dot:2015,qty:4,set:true,setPrice:300,price:75,rims:"Jantes Honda · CR-V 2015",snow:true},
 {id:"D-0002",brand:"Pirelli & Continental",model:"Mixte",season:"ete",w:235,a:60,d:18,li:"",dot:2022,qty:4,set:true,setPrice:500,price:125,rims:"Jantes Volvo · XC60 2022",note:"Pneus mixtes : 2 Pirelli Powergy + 2 Continental"},
 {id:"D-0003",top:2,brand:"Continental",model:"WinterContact TS 870 P",season:"hiver",w:235,a:55,d:19,li:"105 H XL",dot:2025,qty:4,set:true,setPrice:800,price:200,rims:"Jantes Volvo · XC90 2025",snow:true},
 {id:"D-0004",brand:"Pirelli",model:"Scorpion Winter",season:"hiver",w:275,a:45,d:21,li:"110 V",dot:2016,qty:4,set:true,setPrice:700,price:175,rims:"Jantes Land Rover · RR Sport",snow:true,note:"Jantes avec traces d'usage (rayures)"},
 {id:"D-0005",top:3,brand:"Pirelli",model:"Scorpion Winter",season:"hiver",w:275,a:45,d:21,li:"110 V",dot:"À confirmer",qty:4,set:true,setPrice:900,price:225,rims:"Jantes Land Rover · 2022",snow:true},
 {id:"D-0006",brand:"Pirelli",model:"Scorpion Winter PNCS",season:"hiver",w:285,a:35,d:22,li:"106 V",dot:"À confirmer",qty:4,set:true,setPrice:800,price:200,rims:"Tesla Model X · Taille à confirmer",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true,note:"Dimensions à confirmer : peut-être 2× 285/35 R22 + 2× 265/35 R22 (Model X). Mousse anti-bruit PNCS."},
 {id:"D-0007",brand:"Pirelli",model:"Scorpion Winter",season:"hiver",w:245,a:45,d:20,li:"103 V XL",dot:2019,qty:4,set:true,setPrice:400,price:100,rims:"Pneus seuls, sans jantes",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true},
 {id:"D-0008",brand:"Continental",model:"WinterContact TS 850 P",season:"hiver",w:255,a:55,d:20,li:"110 V XL",dot:2019,qty:4,set:true,setPrice:700,price:175,rims:"Jantes Land Rover · 2019",snow:true},
 {id:"D-0009",top:4,brand:"Continental",model:"WinterContact TS 870 P",season:"hiver",w:255,a:55,d:20,li:"110 V XL",dot:2022,qty:4,set:true,setPrice:800,price:200,rims:"Jantes Land Rover · 2022",snow:true,note:"Jantes avec traces d\x27usage (rayures)"},
 {id:"D-0010",brand:"Continental",model:"CrossContact Winter",season:"hiver",w:225,a:65,d:17,li:"102 T",dot:"À confirmer",qty:4,set:true,setPrice:400,price:100,rims:"Jantes Range Rover · 2012",jantes:"Range Rover 2012 (sans caches centraux)",snow:true},
 {id:"D-0011",top:1,brand:"Pirelli",model:"Sottozero 3 Winter",season:"hiver",w:225,a:50,d:17,li:"98 H",dot:"À confirmer",qty:4,set:true,setPrice:350,price:88,rims:"Jantes Jaguar · 2016",jantes:"Jaguar 2016 (sans caches centraux)",snow:true},
 {id:"D-0012",brand:"Continental",model:"WinterContact TS 830 P",season:"hiver",w:225,a:60,d:18,li:"104 V XL",dot:2015,qty:2,set:true,setPrice:150,price:75,rims:"Pneus seuls, sans jantes",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true,note:"2 pneus seulement. Fabriqués en 2015 (DOT 4215)."},
 {id:"D-0013",brand:"Vredestein",model:"Wintrac Pro",season:"hiver",w:285,a:40,d:22,li:"110 V XL",dot:2021,qty:4,set:true,setPrice:600,price:150,rims:"Pneus seuls · Range Rover",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true},
 {id:"D-0014",brand:"Continental",model:"WinterContact TS 850 P SUV",season:"hiver",w:275,a:45,d:21,li:"XL",dot:2021,qty:4,set:true,setPrice:500,price:125,rims:"Pneus seuls · Land Rover",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true},
 {id:"D-0015",brand:"Michelin",model:"Latitude Alpin LA2",season:"hiver",w:235,a:65,d:17,li:"",dot:2015,qty:4,set:true,setPrice:250,price:63,rims:"Pneus seuls, sans jantes",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true,note:"Fabriqués en 2015 (DOT 3515). Profil encore bon."},
 {id:"D-0016",brand:"Uniroyal",model:"MS plus 66",season:"hiver",w:205,a:55,d:16,li:"91 H",dot:"À confirmer",qty:4,set:true,setPrice:250,price:63,rims:"Jantes acier · VW Golf 5",jantes:"Jantes acier noires · VW Golf 5 (2010)",snow:true},
 {id:"D-0017",top:5,brand:"Pirelli",model:"Powergy Winter",season:"hiver",w:235,a:60,d:18,li:"107 H XL",dot:"À confirmer",qty:4,set:true,setPrice:800,price:200,rims:"Jantes noires · Evoque 2024",jantes:"Range Rover Evoque 2024 · noir brillant (sans caches centraux)",snow:true},
 {id:"D-0018",brand:"Michelin",model:"Pilot Alpin 5",season:"hiver",w:215,a:55,d:18,li:"",dot:2022,qty:4,set:true,setPrice:600,price:150,rims:"Jantes Volvo · V60 2022",snow:true},
 {id:"D-0019",brand:"Pirelli",model:"Scorpion Winter",season:"hiver",w:245,a:45,d:20,li:"103 V",dot:2019,qty:4,set:true,setPrice:500,price:125,rims:"Pneus seuls, sans jantes",jantes:"Sans jantes (pneus seuls)",bare:true,snow:true,note:"Marque à confirmer (profil Pirelli Scorpion Winter). Profil presque neuf."},
 {id:"D-0020",brand:"Michelin",model:"Alpin 7",season:"hiver",w:225,a:55,d:16,li:"99 H",dot:2024,qty:4,set:true,setPrice:500,price:125,rims:"Jantes Volvo · S80",jantes:"Volvo S80 · alu 7 branches",snow:true},
 {id:"D-0021",brand:"Michelin",model:"Primacy 4",season:"ete",w:205,a:55,d:16,li:"91 V",dot:"À confirmer",qty:4,set:true,setPrice:400,price:100,rims:"Jantes Volvo · V40",jantes:"Volvo V40 · alu 9 branches",note:"Pneus été. Photos montrent aussi un jeu Goodyear EfficientGrip : modèle exact à confirmer."}
];
const BOOKING_EMAIL="garage-daytona@bluewin.ch";const NEW_MM=8, MOUNT=30, WA="41799198647";
const SEASONS={ete:{name:"Été",sub:"Gomme tendre, au-dessus de 7 °C"},hiver:{name:"Hiver",sub:"Lamelles pour la neige et le froid"},"4s":{name:"4 saisons",sub:"Un seul jeu toute l'année"}};
const sizeOf=t=>`${t.w}/${t.a} R${t.d}`;
const fmt=n=>n.toLocaleString("fr-CH");
const $=s=>document.querySelector(s);

const state={season:"all",size:null,diam:null,current:null,qty:4};

/* ---------------- Header burger ---------------- */
$("#burger")&&$("#burger").addEventListener("click",e=>{const n=$("#siteNav");const o=n.classList.toggle("open");e.currentTarget.setAttribute("aria-expanded",o)});
$("#dd > button")&&$("#dd > button").addEventListener("click",e=>{const d=$("#dd");const o=d.classList.toggle("open");e.currentTarget.setAttribute("aria-expanded",o)});

/* ---------------- Finder ---------------- */
const uniq=a=>[...new Set(a)].sort((x,y)=>x-y);
function fillSel(el,vals,label){el.innerHTML=`<option value="">${label}</option>`+vals.map(v=>`<option>${v}</option>`).join("")}

/* linked selects: each list only offers values that exist with the others, so a search is never empty */
const AVAIL=()=>TIRES.filter(t=>!t.sold);

function linkFinder(changed){
  const F={w:$("#fW"),a:$("#fA"),d:$("#fD")};
  const v={w:+F.w.value||null,a:+F.a.value||null,d:+F.d.value||null};
  const fits=(t,skip)=>["w","a","d"].every(k=>k===skip||!v[k]||t[k]===v[k]);
  // if the full combination no longer exists, keep the field just changed and clear the others that conflict
  if(changed&&!AVAIL().some(t=>fits(t))){
    for(const k of ["w","a","d"]){ if(k!==changed&&v[k]&&!AVAIL().some(t=>t[changed]===v[changed]&&t[k]===v[k])) v[k]=null; }
    if(!AVAIL().some(t=>fits(t))) for(const k of ["w","a","d"]) if(k!==changed) v[k]=null;
  }
  // when the user picked something and only one value fits a field, fill it in for them
  if(changed&&v[changed]){for(let i=0;i<3;i++)for(const k of ["w","a","d"]){if(!v[k]){const c=uniq(AVAIL().filter(t=>fits(t,k)).map(t=>t[k]));if(c.length===1)v[k]=c[0];}}}
  for(const k of ["w","a","d"]){
    const vals=uniq(AVAIL().filter(t=>fits(t,k)).map(t=>t[k]));
    fillSel(F[k],vals,{w:"205",a:"55",d:"16"}[k]); F[k].value=v[k]&&vals.includes(v[k])?v[k]:""; F[k].classList.toggle("ph",!F[k].value);
  }
  const n=AVAIL().filter(t=>fits(t)).length;
  const any=v.w||v.a||v.d;
  $(".hx-go").innerHTML=any?`Voir ${n} jeu${n>1?"x":""} <span aria-hidden="true">→</span>`:`Trouver mes pneus <span aria-hidden="true">→</span>`;
}
linkFinder();
$("#fW").addEventListener("change",()=>linkFinder("w"));
$("#fA").addEventListener("change",()=>linkFinder("a"));
$("#fD").addEventListener("change",()=>linkFinder("d"));

$("#stockCount")&&($("#stockCount").textContent=TIRES.reduce((s,t)=>s+t.qty,0)+" pneus · "+TIRES.length+" modèles");

$("#finder").addEventListener("submit",e=>{
  e.preventDefault();
  const w=$("#fW").value,a=$("#fA").value,d=$("#fD").value;
  state.size=(w||a||d)?{w:+w||null,a:+a||null,d:+d||null}:null;
  state.diam=null;
  render();
  $("#catalogue").scrollIntoView({behavior:matchMedia("(prefers-reduced-motion: reduce)").matches?"auto":"smooth"});
});

/* ---------------- Filtering ---------------- */
function matches(t){
  if(state.season!=="all"&&t.season!==state.season)return false;
  if(state.size){const s=state.size;if(s.w&&t.w!==s.w)return false;if(s.a&&t.a!==s.a)return false;if(s.d&&t.d!==s.d)return false}
  if(state.diam&&t.d!==state.diam)return false;
  return true;
}
state.cat="all";state.sort="";
const CATS=[["all","Tous"],["voit","Hiver · Voitures"],["suv","Hiver · SUV"],["ete","Été"]];
const inCat=(t,c)=>c==="all"||(c==="ete"&&t.season==="ete")||(c==="voit"&&t.season!=="ete"&&t.d<=18)||(c==="suv"&&t.season!=="ete"&&t.d>18);
document.addEventListener("click",e=>{const b=e.target.closest("[data-cat]");if(!b)return;state.cat=b.dataset.cat;state.more=false;render(true)});
document.addEventListener("click",e=>{const b=e.target.closest("#moreBtn");if(!b)return;state.more=true;const hid=[...document.querySelectorAll("#stockGrid .is-more")];hid.forEach((c,i)=>{c.classList.remove("is-more");c.animate([{opacity:0,transform:"translateY(14px)"},{opacity:1,transform:"none"}],{duration:420,delay:i*60,easing:"cubic-bezier(.2,.7,.2,1)",fill:"backwards"})});b.remove()});
document.addEventListener("change",e=>{if(e.target.id==="sortSel"){state.sort=e.target.value;render(true)}});

/* ---------------- Cards ---------------- */
const IMG={}; // tire id -> data URL (rendered once by the 3D engine)
function waText(t,q,mount){
  if(t.set) return `Bonjour Garage Daytona, je suis intéressé par ${t.qty===2?"la paire de 2":"le jeu de "+t.qty} pneus ${t.brand} ${t.model} ${sizeOf(t)}${t.rims?" ("+t.rims+")":""}, réf. ${t.id}, à ${t.setPrice} CHF${mount?", avec montage":""}. Est-il encore disponible ? Merci.`;
  return `Bonjour Garage Daytona, je souhaite ${q} pneu${q>1?"s":""} ${t.brand} ${t.model} ${sizeOf(t)} (réf. ${t.id})${mount?", avec montage":""}. Est-ce encore disponible ? Merci.`;
}
const waUrl=txt=>`https://wa.me/${WA}?text=${encodeURIComponent(txt)}`;
const waSvg='<svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.4-.7-2.9-1.1-4.7-4.1-4.8-4.3-.1-.2-1.2-1.6-1.2-3s.8-2.2 1-2.5c.3-.3.6-.4.8-.4h.6c.2 0 .5 0 .7.6l.9 2.2c.1.2.1.4 0 .6l-.4.6-.5.5c-.2.2-.3.4-.1.7.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.2.5.1.7-.1l.9-1.1c.2-.3.5-.2.7-.1l2.1 1c.3.2.5.2.6.4.1.1.1.7-.1 1.3Z"/></svg>';
function card(t){
  if(t.set){
    const ph=PHOTOS[t.id]||{};
    if(t.sold) return `<article class="card pcard is-sold" data-id="${t.id}">
    <div class="card-img" style="--lqbg:url(${ph.lq||""})">
      <img class="lz" src="${(ph.hero||"").replace("-hero.webp","-card.webp")}" loading="lazy" decoding="async" onload="this.classList.add('in')" alt="${t.brand} ${t.model} ${sizeOf(t)}">
      <span class="sold-tag">Vendu</span>
    </div>
    <div class="card-body">
      <div class="brand"><b>${t.brand}</b> · ${t.model}</div>
      <div class="size num">${sizeOf(t)}<small class="rims">${t.rims}</small></div>
      <div class="price-row"><div class="price num"><s>${fmt(t.setPrice)}</s> <small>CHF</small></div></div>
      <div class="actions"><span class="btn sold-btn">Déjà vendu</span></div>
    </div>
  </article>`;
    return `<article class="card pcard" data-id="${t.id}">
    <button class="card-img" style="--lqbg:url(${ph.lq||""})" data-open="${t.id}" aria-label="Voir ${t.brand} ${t.model} ${sizeOf(t)}">
      <img class="lz" src="${(ph.hero||"").replace("-hero.webp","-card.webp")}" srcset="${(ph.hero||"").replace("-hero.webp","-card.webp")} 480w, ${ph.hero||""} 720w" sizes="(max-width:700px) 82vw, 300px" loading="lazy" decoding="async" onload="this.classList.add('in')" alt="${t.brand} ${t.model} ${sizeOf(t)}">
      <span class="season">${SEASONS[t.season].name}</span>
      <span class="stock">${t.qty===2?"Paire":"Jeu de "+t.qty}</span>
      <span class="pcount">${(ph.gallery||[]).length} photos</span>
    </button>
    <div class="card-body">
      <div class="brand"><b>${t.brand}</b> · ${t.model}</div>
      <div class="size num">${sizeOf(t)}<small class="rims">${t.rims}</small></div>
      <div class="feat"><span>${t.snow?"❄ Neige M+S":"☀ Été"}</span><span>${typeof t.dot==="number"?"DOT "+t.dot:(t.bare?"Pneus seuls":"Avec jantes")}</span></div>
      <div class="price-row"><div class="price num">${fmt(t.setPrice)} <small>CHF ${t.qty===2?"la paire":"le jeu de "+t.qty}</small></div></div>
      <div class="actions">
        <button class="btn btn-copper" data-open="${t.id}">Réserver</button>
        <a class="btn btn-wa wa-ico" href="${waUrl(waText(t,t.qty,false))}" target="_blank" rel="noopener" aria-label="Commander par WhatsApp">${waSvg}</a>
      </div>
    </div>
  </article>`;
  }
  const pct=Math.round(t.tread/NEW_MM*100);
  const low=t.qty<=2;
  const q=Math.min(4,t.qty);
  return `<article class="card" data-id="${t.id}">
    <button class="card-img" data-open="${t.id}" aria-label="Voir ${t.brand} ${t.model} ${sizeOf(t)}">
      <img data-img="${t.id}" alt="" ${IMG[t.id]?`src="${IMG[t.id]}"`:""}>
      <span class="season">${SEASONS[t.season].name}</span>
      <span class="stock ${low?"":"ok"}">${low?`Plus que ${t.qty}`:`${t.qty} en stock`}</span>
    </button>
    <div class="card-body">
      <div class="brand"><b>${t.brand}</b> · ${t.model}</div>
      <div class="size num">${sizeOf(t)}<small>DOT ${t.dot}</small></div>
      <div class="gauge">
        <div class="gauge-top"><span>Profil restant</span><b class="num">${t.tread.toFixed(1).replace(".",",")} mm · ${pct}%</b></div>
        <div class="meter"><i data-w="${pct}"></i></div>
      </div>
      <div class="price-row">
        <div class="price num">${t.price} <small>CHF / pneu</small></div>
        <div class="price-4">${q}× <b class="num">${fmt(t.price*q)} CHF</b></div>
      </div>
      <div class="actions">
        <button class="btn btn-copper" data-open="${t.id}">Réserver</button>
        <a class="btn btn-wa wa-ico" href="${waUrl(waText(t,q,true))}" target="_blank" rel="noopener" aria-label="Commander par WhatsApp">${waSvg}</a>
      </div>
    </div>
  </article>`;
}


function setupShelfNav(){
  document.querySelectorAll(".shelf").forEach(sh=>{
    const tr=sh.querySelector(".track");if(!tr)return;
    const pv=sh.querySelector(".sh-nav.prev"),nx=sh.querySelector(".sh-nav.next"),bar=sh.querySelector(".sh-prog i");
    const upd=()=>{
      const max=tr.scrollWidth-tr.clientWidth;
      sh.classList.toggle("scrollable",max>4);
      if(pv){pv.disabled=tr.scrollLeft<=2;nx.disabled=tr.scrollLeft>=max-2;}
      if(bar&&tr.scrollWidth){const w=tr.clientWidth/tr.scrollWidth;bar.style.width=(w*100)+"%";bar.style.transform=`translateX(${(tr.scrollLeft/tr.clientWidth)*100}%)`;}
    };
    const step=dir=>{const c=tr.querySelector(".card");const g=parseFloat(getComputedStyle(tr).columnGap)||16;const cw=(c?c.offsetWidth:280)+g;const per=Math.max(1,Math.floor((tr.clientWidth+g)/cw));tr.scrollBy({left:dir*per*cw,behavior:"smooth"});};
    if(pv){pv.onclick=()=>step(-1);nx.onclick=()=>step(1);}
    tr.addEventListener("scroll",upd,{passive:true});addEventListener("resize",upd);upd();
  });
}

/* ===== laptop catalogue: 3 sections (selection mosaic, winter slider, summer) ===== */
const DESK=matchMedia("(min-width:981px)");
DESK.addEventListener&&DESK.addEventListener("change",()=>render());
const ICO={"star": "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linejoin=\"round\"><path d=\"M12 3l2.6 5.6 6.1.7-4.5 4.2 1.2 6L12 16.6 6.6 19.5l1.2-6L3.3 9.3l6.1-.7z\"/></svg>", "snow": "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"><path d=\"M12 2v20M3.3 7l17.4 10M3.3 17L20.7 7M9 4l3 3 3-3M9 20l3-3 3 3M4.5 10.2l4.1-.3-1.6-3.8M19.5 13.8l-4.1.3 1.6 3.8M4.5 13.8l4.1.3-1.6 3.8M19.5 10.2l-4.1-.3 1.6-3.8\"/></svg>", "sun": "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"><circle cx=\"12\" cy=\"12\" r=\"4.2\"/><path d=\"M12 2.5v2.2M12 19.3v2.2M2.5 12h2.2M19.3 12h2.2M5.3 5.3l1.6 1.6M17.1 17.1l1.6 1.6M5.3 18.7l1.6-1.6M17.1 6.9l1.6-1.6\"/></svg>", "grid": "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.6\"><rect x=\"3.5\" y=\"3.5\" width=\"7\" height=\"7\" rx=\"1.5\"/><rect x=\"13.5\" y=\"3.5\" width=\"7\" height=\"7\" rx=\"1.5\"/><rect x=\"3.5\" y=\"13.5\" width=\"7\" height=\"7\" rx=\"1.5\"/><rect x=\"13.5\" y=\"13.5\" width=\"7\" height=\"7\" rx=\"1.5\"/></svg>", "sort": "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M7 4v16M3.5 16.5L7 20l3.5-3.5M17 20V4M13.5 7.5L17 4l3.5 3.5\"/></svg>"};

const arrows=`<span class="dsl-ctrl"><button type="button" class="dsl-nav prev" aria-label="Précédent"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button><button type="button" class="dsl-nav next" aria-label="Suivant"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg></button></span>`;
function secHead(n,ico,kicker,title,sub,extra){return `<div class="dsec-head"><span class="dsec-ico">${ICO[ico]}</span><div class="dsec-tt"><span class="dsec-k"><b>${n}</b>${kicker}</span><h3>${title}</h3><p>${sub}</p></div>${extra||""}</div>`}
function deskHTML(list){
  const feat=list.filter(t=>t.top&&!t.sold).sort((x,y)=>x.top-y.top);
  const rest=list.filter(t=>!t.top||t.sold);
  const win=rest.filter(t=>t.season!=="ete").sort((x,y)=>(x.sold?1:0)-(y.sold?1:0));
  const ete=rest.filter(t=>t.season==="ete").sort((x,y)=>(x.sold?1:0)-(y.sold?1:0));
  const av=a=>a.filter(t=>!t.sold).length;
  let h="";
  if(feat.length) h+=`<section class="dsec">${secHead("01","star","Sélection","Sélection <em>du moment</em>","Nos plus beaux jeux, choisis à l'atelier")}<div class="feat-grid">${feat.map((t,i)=>i===0?card(t).replace('class="card pcard','class="card pcard feat-main'):card(t)).join("")}</div></section>`;
  if(win.length) h+=`<section class="dsec dsec-win">${secHead("02","snow","Hiver","Pneus <em>d'hiver</em>",`Lamelles pour la neige et le froid · ${av(win)} jeux disponibles`,win.length>4?arrows:"")}<div class="dsl" data-auto="3200"><div class="dsl-track">${win.map(card).join("")}</div></div>${win.length>4?`<div class="dsl-bar" aria-hidden="true"><i></i></div>`:""}</section>`;
  if(ete.length) h+=`<section class="dsec dsec-ete">${secHead("03","sun","Été","Pneus <em>d'été</em>",`Gomme tendre, au-dessus de 7 °C · ${av(ete)} jeu${av(ete)>1?"x":""} disponible${av(ete)>1?"s":""}`)}<div class="ete-row" style="${ete.length<3?`grid-template-columns:1.6fr repeat(${ete.length},1fr)`:""}"><div class="ete-panel"><span class="ete-ico">${ICO.sun}</span><b>Saison chaude</b><p>Meilleure adhérence et freinage plus court sur route sèche et mouillée dès 7 °C.</p></div>${ete.map(card).join("")}</div></section>`;
  return h;
}
function setupDSlider(){
  document.querySelectorAll(".dsec-win").forEach(sec=>{
    const vp=sec.querySelector(".dsl"),tr=sec.querySelector(".dsl-track");if(!vp||!tr)return;
    const cards=[...tr.children],pv=sec.querySelector(".dsl-nav.prev"),nx=sec.querySelector(".dsl-nav.next"),bar=sec.querySelector(".dsl-bar i");
    let i=0,timer=null;const per=4,max=Math.max(0,cards.length-per);
    const step=()=>cards[0]?cards[0].getBoundingClientRect().width+parseFloat(getComputedStyle(tr).columnGap||22):0;
    const go=n=>{i=n<0?max:n>max?0:n;tr.style.transform=`translate3d(${-i*step()}px,0,0)`;if(bar){bar.style.width=(per/cards.length*100)+"%";bar.style.transform=`translateX(${i/per*100}%)`}};
    const auto=+vp.dataset.auto,reduce=matchMedia("(prefers-reduced-motion: reduce)").matches;
    const start=()=>{stop();if(!reduce&&max>0)timer=setInterval(()=>go(i+1),auto)};
    const stop=()=>{timer&&clearInterval(timer);timer=null};
    pv&&(pv.onclick=()=>{go(i-1);start()});nx&&(nx.onclick=()=>{go(i+1);start()});
    sec.addEventListener("mouseenter",stop);sec.addEventListener("mouseleave",start);sec.addEventListener("focusin",stop);
    document.addEventListener("visibilitychange",()=>document.hidden?stop():start());
    addEventListener("resize",()=>go(i));
    go(0);start();
  });
}
function render(fromTab){
  const list=TIRES.filter(matches);
  // active filters
  const bar=$("#activebar");
  let chips="";
  if(state.size){const s=state.size;chips+=`<span class="chip">${s.w||"—"}/${s.a||"—"} R${s.d||"—"} · ${list.length} résultat${list.length>1?"s":""}<button data-clear="size" aria-label="Effacer la taille">✕</button></span>`}
  if(state.diam){chips+=`<span class="chip">Jante ${state.diam}" · ${list.length} résultat${list.length>1?"s":""}<button data-clear="diam" aria-label="Effacer la jante">✕</button></span>`}
  bar.innerHTML=chips+`<span class="demo-note">Stock réel · nouveaux jeux chaque semaine</span>`;

  let html="";
  if(DESK.matches&&!state.size&&!state.diam){
    $("#shelves").innerHTML=deskHTML(list);setupDSlider();animateMeters&&animateMeters();return;
  }
  const price=t=>t.setPrice||t.price;
  const sorter=(x,y)=>(x.sold?1:0)-(y.sold?1:0)||(state.sort==="asc"?price(x)-price(y):state.sort==="desc"?price(y)-price(x):0);
  const searching=!!(state.size||state.diam);
  const feat=searching?[]:list.filter(t=>t.top&&!t.sold).sort((x,y)=>x.top-y.top);
  if(feat.length){
    html+=`<div class="blk">
      ${secHead("01","star","Sélection","Sélection <em>du moment</em>","Nos plus beaux jeux, choisis à l'atelier")}
      <div class="feat-grid">${feat.map((t,i)=>i===0?card(t).replace('class="card pcard','class="card pcard feat-main'):card(t)).join("")}</div>
    </div>`;
  }
  const rest=list.filter(t=>searching||!t.top||t.sold);
  const NICE=["D-0018","D-0020","D-0021","D-0002","D-0001","D-0010","D-0006","D-0013","D-0004","D-0008","D-0016","D-0014","D-0015","D-0019","D-0007","D-0012"];
  const nice=t=>{const k=NICE.indexOf(t.id);return k<0?99:k};
  const shown=rest.filter(t=>inCat(t,state.cat)).sort((x,y)=>sorter(x,y)||(state.sort?0:nice(x)-nice(y)));
  const LIM=8, cut=!state.more&&shown.length>LIM;
  if(rest.length){
    const n=c=>rest.filter(t=>inCat(t,c)&&!t.sold).length;
    html+=`<div class="blk">
      ${secHead(searching?"":"02","grid",searching?"Recherche":"Stock",searching?"Vos <em>résultats</em>":"Tout le <em>stock</em>",`${rest.filter(t=>!t.sold).length} jeux disponibles`,`<label class="sort-btn" aria-label="Trier par prix">${ICO.sort}<select id="sortSel"><option value="">Par défaut</option><option value="asc"${state.sort==="asc"?" selected":""}>Prix croissant</option><option value="desc"${state.sort==="desc"?" selected":""}>Prix décroissant</option></select></label>`)}
      <div class="cats" role="tablist">${CATS.filter(([c])=>c==="all"||n(c)).map(([c,l])=>`<button type="button" role="tab" data-cat="${c}" aria-selected="${state.cat===c}">${l}<span class="num">${n(c)}</span></button>`).join("")}</div>
      <div class="grid" id="stockGrid">${shown.map((t,i)=>cut&&i>=LIM?card(t).replace('class="card pcard','class="card pcard is-more'):card(t)).join("")||`<p class="grid-empty">Aucun jeu dans cette catégorie pour le moment.</p>`}</div>
      ${cut?`<button type="button" class="more-btn" id="moreBtn"><span>Voir plus de jeux</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></button>`:""}
    </div>`;
  }
  if(!html){
    const s=state.size?`${state.size.w||""}/${state.size.a||""} R${state.size.d||""}`:"cette taille";
    html=`<div class="empty"><p>Pas de pneu en ${s} sur l'étagère pour le moment.<br>Écrivez-nous : le stock arrive chaque semaine.</p>
      <a class="btn btn-wa" target="_blank" rel="noopener" href="${waUrl(`Bonjour Garage Daytona, je cherche des pneus d'occasion en ${s}. Avez-vous quelque chose ?`)}">Demander par WhatsApp</a></div>`;
  }
  const sh=$("#shelves");
  if(fromTab){const g=sh.querySelector("#stockGrid");if(g){g.style.opacity="0"}}
  sh.innerHTML=html;
  if(fromTab){const g=sh.querySelector("#stockGrid");if(g){g.animate([{opacity:0,transform:"translateY(8px)"},{opacity:1,transform:"none"}],{duration:320,easing:"ease-out"})}}
  animateMeters();
}
document.addEventListener("click",e=>{
  const c=e.target.closest("[data-clear]");
  if(c){state[c.dataset.clear]=null;if(c.dataset.clear==="diam")syncPills();render();return}
  const o=e.target.closest("[data-open]");
  if(o){openDrawer(o.dataset.open)}
});

/* Meters fill when they come into view (visible at rest without JS observers firing) */
let meterObs=null;
function animateMeters(){
  const ms=document.querySelectorAll(".meter i");
  if(!("IntersectionObserver" in window)||matchMedia("(prefers-reduced-motion: reduce)").matches){ms.forEach(m=>m.style.width=m.dataset.w+"%");return}
  meterObs&&meterObs.disconnect();
  meterObs=new IntersectionObserver(es=>es.forEach(en=>{if(en.isIntersecting){en.target.style.width=en.target.dataset.w+"%";meterObs.unobserve(en.target)}}),{threshold:.4});
  ms.forEach(m=>meterObs.observe(m));
  setTimeout(()=>ms.forEach(m=>{if(!m.style.width)m.style.width=m.dataset.w+"%"}),2500);
}

/* ---------------- Size table ---------------- */
const diams=uniq(TIRES.map(t=>t.d));
$("#pills")&&($("#pills").innerHTML=`<button class="pill" data-d="" aria-pressed="true">Tous</button>`+diams.map(d=>`<button class="pill num" data-d="${d}" aria-pressed="false">${d}"</button>`).join(""));
let tableDiam=null;
function syncPills(){document.querySelectorAll(".pill").forEach(p=>p.setAttribute("aria-pressed",String((p.dataset.d===""&&!tableDiam)||+p.dataset.d===tableDiam)))}
$("#pills")&&$("#pills").addEventListener("click",e=>{const p=e.target.closest(".pill");if(!p)return;tableDiam=p.dataset.d?+p.dataset.d:null;syncPills();renderTable()});
function renderTable(){if(!$("#pills"))return;
  const groups={};
  TIRES.filter(t=>!tableDiam||t.d===tableDiam).forEach(t=>{const k=sizeOf(t);(groups[k]=groups[k]||[]).push(t)});
  const rows=Object.entries(groups).sort((x,y)=>x[1][0].d-y[1][0].d||x[1][0].w-y[1][0].w);
  $("#sizeRows").innerHTML=rows.map(([k,ts])=>{
    const seasons=[...new Set(ts.map(t=>SEASONS[t.season].name))].join(", ");
    return `<tr tabindex="0" data-w="${ts[0].w}" data-a="${ts[0].a}" data-d="${ts[0].d}"><td class="sz num">${k}</td><td>${seasons}</td><td class="num">${ts.reduce((s,t)=>s+t.qty,0)}</td><td class="num">${Math.min(...ts.map(t=>t.price))} CHF</td><td><span class="go">Voir →</span></td></tr>`;
  }).join("");
}
function pickRow(tr){
  state.size={w:+tr.dataset.w,a:+tr.dataset.a,d:+tr.dataset.d};state.diam=null;state.season="all";
  $("#fW").value=tr.dataset.w;$("#fA").value=tr.dataset.a;$("#fD").value=tr.dataset.d;linkFinder();
  render();$("#catalogue").scrollIntoView({behavior:"smooth"});
}
$("#sizeRows")&&$("#sizeRows").addEventListener("click",e=>{const tr=e.target.closest("tr");tr&&pickRow(tr)});
$("#sizeRows")&&$("#sizeRows").addEventListener("keydown",e=>{if(e.key==="Enter"){const tr=e.target.closest("tr");tr&&pickRow(tr)}});

/* ---------------- Drawer ---------------- */
const days=(()=>{const out=[];const d=new Date();let n=0;while(out.length<6){d.setDate(d.getDate()+(n++?1:1));const wd=d.getDay();if(wd===0)continue;out.push(new Date(d))}return out})();
$("#rDay").innerHTML=`<option value="">Jour souhaité</option>`+days.map(d=>{const s=d.toLocaleDateString("fr-CH",{weekday:"long",day:"numeric",month:"long"});return `<option>${s.charAt(0).toUpperCase()+s.slice(1)}${d.getDay()===6?" (sur rdv)":""}</option>`}).join("");

$("#dxDays").innerHTML=days.map((d,k)=>{const wd=d.toLocaleDateString("fr-CH",{weekday:"short"}).replace(".","");return `<button type="button" data-k="${k}" aria-pressed="false"><i>${wd}</i><b>${d.getDate()}</b>${d.getDay()===6?"<em>sur rdv</em>":""}</button>`}).join("");
$("#dxDays").addEventListener("click",e=>{const b=e.target.closest("button");if(!b)return;document.querySelectorAll("#dxDays button").forEach(x=>x.setAttribute("aria-pressed",x===b?"true":"false"));$("#rDay").selectedIndex=+b.dataset.k+1;$("#rErr").textContent=""});
(()=>{let x0=null;const g=$("#drGal");g.addEventListener("touchstart",e=>{x0=e.touches[0].clientX},{passive:true});g.addEventListener("touchend",e=>{if(x0===null||gal.length<2)return;const dx=e.changedTouches[0].clientX-x0;x0=null;if(Math.abs(dx)>40){gi=(gi+(dx<0?1:-1)+gal.length)%gal.length;showG()}},{passive:true})})();
let lastFocus=null;
let gal=[],gi=0;
const _pre=new Set();function preGal(id){if(_pre.has(id))return;_pre.add(id);const ph=PHOTOS[id];if(ph)ph.gallery.forEach(u=>{const im=new Image();im.src=u})}
document.addEventListener("pointerdown",e=>{const c=e.target.closest(".pcard");if(c)preGal(c.dataset.id)},{passive:true});document.addEventListener("pointerover",e=>{const c=e.target.closest(".pcard");if(c)preGal(c.dataset.id)},{passive:true});
function showG(){$("#drImg").src=gal[gi]||"";$("#gCap").textContent=(gi+1)+" / "+gal.length;document.querySelectorAll("#gThumbs button").forEach((b,k)=>b.classList.toggle("on",k===gi))}
$("#gPrev").addEventListener("click",()=>{gi=(gi-1+gal.length)%gal.length;showG()});
$("#gNext").addEventListener("click",()=>{gi=(gi+1)%gal.length;showG()});
$("#gThumbs").addEventListener("click",e=>{const b=e.target.closest("[data-g]");if(b){gi=+b.dataset.g;showG()}});
function openDrawer(id){
  const t=TIRES.find(x=>x.id===id);if(!t)return;
  state.current=t;state.qty=Math.min(4,t.qty>=4?4:t.qty>=2?2:1);
  $("#drRef").textContent="Réf. "+t.id;$("#drSeason").textContent=SEASONS[t.season].name+(t.snow?" · M+S":"");$("#drSeason").dataset.s=t.season;$("#dxPrice").innerHTML=t.set?`${fmt(t.setPrice)} <small>CHF</small>`:`${t.price} <small>CHF</small>`;$("#dxPer").textContent=t.set?(t.qty===2?"la paire":`le jeu de ${t.qty}`):"le pneu";$("#dxBtnPrice").textContent=(t.set?fmt(t.setPrice):t.price)+" CHF";$("#dxRims").textContent=t.bare?"Sans jantes":"Jantes incluses";document.querySelectorAll("#dxDays button").forEach(b=>b.setAttribute("aria-pressed","false"));$("#rDay").selectedIndex=0;
  const ph=PHOTOS[t.id];
  gal=ph?ph.gallery:[IMG[t.id]||""];gi=0;showG();gal.forEach(u=>{if(u){const im=new Image();im.decoding="async";im.src=u}});
  $("#gThumbs").innerHTML=gal.length>1?gal.map((g,k)=>`<button type="button" data-g="${k}"><img src="${g.replace(/\.webp$/,"-t.webp")}" alt=""></button>`).join(""):"";
  $("#gPrev").hidden=$("#gNext").hidden=$("#gCap").hidden=gal.length<2;
  $("#drImg").alt=`${t.brand} ${t.model} ${sizeOf(t)}`;
  $("#drBrand").innerHTML=`<b>${t.brand}</b> · ${t.model}`;
  $("#drTitle").textContent=sizeOf(t);
  if(t.set){
    $("#drSpecs").innerHTML=[["Dimensions",`${sizeOf(t)} ${t.li||""}`],["Saison",SEASONS[t.season].name+(t.snow?" · M+S ❄":"")],["Jantes",t.jantes||t.rims.replace(" incluses","")],...(t.note?[["État",t.note]]:[]),["Quantité",t.qty===2?"Paire (2 pneus)":`Jeu de ${t.qty}`],...(t.dot&&!/confirm/i.test(t.dot)?[["Année (DOT)",t.dot]]:[])].map(([k,v])=>`<div><dt>${k}</dt><dd class="num">${v}</dd></div>`).join("");
    state.qty=t.qty;$("#qtyLabel").hidden=$("#qtySeg").hidden=true;
  }else{
    const pct=Math.round(t.tread/NEW_MM*100);
    $("#drSpecs").innerHTML=[["Profil restant",`${t.tread.toFixed(1).replace(".",",")} mm (${pct}%)`],["Année (DOT)",t.dot],["Saison",SEASONS[t.season].name],["En stock",`${t.qty} pneu${t.qty>1?"s":""}`],["Prix",`${t.price} CHF / pneu`],["Contrôle","4 points, OK"]].map(([k,v])=>`<div><dt>${k}</dt><dd class="num">${v}</dd></div>`).join("");
    $("#qtyLabel").hidden=$("#qtySeg").hidden=false;
    document.querySelectorAll("#qtySeg button").forEach(b=>{b.disabled=+b.dataset.q>t.qty});
  }
  $("#drMain").hidden=false;$("#drDone").hidden=true;$("#drFoot").hidden=false;
  $("#rErr").textContent="";
  updateTotal();
  lastFocus=document.activeElement;
  $("#scrim").classList.add("on");$("#drawer").classList.add("on");$("#drawer").setAttribute("aria-hidden","false");
  $("#drScroll").scrollTop=0;
  setTimeout(()=>$("#drClose").focus(),60);
  setSticky();
}
function closeDrawer(){
  $("#scrim").classList.remove("on");$("#drawer").classList.remove("on");$("#drawer").setAttribute("aria-hidden","true");
  lastFocus&&lastFocus.focus&&lastFocus.focus();
}
$("#drClose").addEventListener("click",closeDrawer);
$("#scrim").addEventListener("click",closeDrawer);
document.addEventListener("keydown",e=>{if(e.key==="Escape"&&$("#drawer").classList.contains("on"))closeDrawer()});
$("#qtySeg").addEventListener("click",e=>{const b=e.target.closest("button");if(!b||b.disabled)return;state.qty=+b.dataset.q;updateTotal()});
$("#mount").addEventListener("change",updateTotal);
function updateTotal(){
  const t=state.current;if(!t)return;
  document.querySelectorAll("#qtySeg button").forEach(b=>b.setAttribute("aria-pressed",+b.dataset.q===state.qty));
  const m=$("#mount").checked;
  const tires=t.set?t.setPrice:t.price*state.qty, mount=m?MOUNT*state.qty:0;
  $("#totalPrice").innerHTML=`${fmt(tires+mount)} <small>CHF</small>`;
  $("#totalDetail").textContent=t.set?`${t.qty===2?"Paire":"Jeu de "+t.qty} · ${fmt(t.setPrice)} CHF${m?` + montage ${mount} CHF`:""}`:`${state.qty} × ${t.price} CHF${m?` + montage ${mount} CHF`:""}`;
  $("#drWa").href=waUrl(waText(t,state.qty,m));
}
$("#drReserve").addEventListener("click",()=>{
  const name=$("#rName").value.trim(), phone=$("#rPhone").value.trim(), day=$("#rDay").value;
  if(!name){$("#rErr").textContent="Indiquez votre nom pour la réservation.";$("#rName").focus();return}
  if(phone.replace(/\D/g,"").length<9){$("#rErr").textContent="Indiquez un numéro de téléphone complet, par exemple 079 123 45 67.";$("#rPhone").focus();return}
  if(!day){$("#rErr").textContent="Choisissez le jour où vous souhaitez passer.";const fb=$("#dxDays button");fb&&fb.focus();return}
  const t=state.current;
  const ref="RES-"+String(Math.floor(1000+Math.random()*9000));
  const what=`${t.qty===2?"Paire":"Jeu de "+t.qty} ${t.brand} ${t.model} ${sizeOf(t)} (réf. ${t.id}) · ${fmt(t.setPrice)} CHF`;
  $("#doneRef").textContent=ref;
  $("#doneTxt").textContent=`${what}. Retrait : ${day}.`;$("#doneWhat").textContent=`${t.brand} ${t.model} · ${sizeOf(t)} · ${t.qty===2?"paire":"jeu de "+t.qty}`;$("#doneDay").textContent=day;
  const msg=`Bonjour Garage Daytona,\nNouvelle réservation ${ref}\n${what}\nRetrait souhaité : ${day}\nNom : ${name}\nTéléphone : ${phone}`;
  /* LIVE: POST {ref,id:t.id,name,phone,day} to the WordPress endpoint, which emails BOOKING_EMAIL */
  if(window.BOOKING_ENDPOINT){fetch(BOOKING_ENDPOINT,{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({ref,id:t.id,what,name,phone,day})}).catch(()=>{})}
  $("#doneWa").href=waUrl(msg);
  $("#drMain").hidden=true;$("#drDone").hidden=false;$("#drFoot").hidden=true;$("#drScroll").scrollTop=0;
});
$("#resForm").addEventListener("submit",e=>e.preventDefault());

/* ---------------- Mobile sticky bar ---------------- */
function setSticky(){
  const t=state.current;
  if(t){$("#stickyTxt").innerHTML=`<b class="num">${sizeOf(t)}</b> · ${t.brand} · ${t.set?fmt(t.setPrice)+" CHF le jeu":t.price+" CHF"}`;$("#stickyBtn").textContent="Réserver";}
  else{const av=TIRES.filter(t=>!t.sold);$("#stickyTxt").innerHTML=`<b>Jeux complets</b> · prix fixe`;$("#stickyBtn").textContent="Trouver mes pneus";}
}
$("#stickyBtn").addEventListener("click",()=>{state.current?openDrawer(state.current.id):$("#finder").scrollIntoView({behavior:"smooth",block:"center"})});
const heroEl=$(".hero");
function onScroll(){$("#sticky").classList.toggle("show",heroEl.getBoundingClientRect().bottom<0)}
addEventListener("scroll",onScroll,{passive:true});

setSticky();render();

/* =====================================================================
   3D: tire built by hand (lathe profile + procedural tread and sidewall)
   ===================================================================== */
/* ---- hero A: studio photo — drop onto the pedestal, ring flash, light sweep, depth parallax ---- */
try{
  const ph=$("#heroPhoto"),stage=$("#stage"),cos=[...document.querySelectorAll("#callouts .co")];
  const reduce=matchMedia("(prefers-reduced-motion: reduce)").matches;
  if(!reduce){stage.classList.add("intro");setTimeout(()=>stage.classList.remove("intro"),1800)}
  (function(){
    const copy=document.querySelector(".hx-copy");
    const items=[...copy.querySelectorAll(".hx-in,.hx-l>span")].sort((a,b)=>a.compareDocumentPosition(b)&2?1:-1);
    const counts=[...copy.querySelectorAll("[data-count]")];
    if(reduce){cos.forEach(c=>c.classList.add("on"));return}
    copy.classList.add("js-seq");
    const T0=1500;
    items.forEach((el,i)=>{el.style.transitionDelay=(i*.13)+"s"});
    setTimeout(()=>copy.classList.add("go"),T0);
    setTimeout(()=>counts.forEach(el=>{const to=parseFloat(el.dataset.count),dec=+(el.dataset.dec||0),st=performance.now();
      (function f(n){const k=Math.min(1,(n-st)/1100),e=1-Math.pow(1-k,3);el.textContent=(to*e).toFixed(dec);if(k<1)requestAnimationFrame(f)})(st)}),T0+items.length*130);
    setTimeout(()=>cos.forEach((c,i)=>setTimeout(()=>c.classList.add("on"),i*150)),T0+150);
  })();
  if(!reduce){
    stage.addEventListener("pointermove",e=>{const b=stage.getBoundingClientRect();const x=(e.clientX-b.left)/b.width-.5,y=(e.clientY-b.top)/b.height-.5;stage.style.setProperty("--rx",(x*7).toFixed(2)+"deg");stage.style.setProperty("--ry",(-y*4).toFixed(2)+"deg");stage.style.setProperty("--gx",(-x*26).toFixed(1)+"px")});
    stage.addEventListener("pointerleave",()=>{stage.style.setProperty("--rx","0deg");stage.style.setProperty("--ry","0deg");stage.style.setProperty("--gx","0px")});
  }
}catch(err){console.warn("hero",err)}


if(!window.THREE){return}
const T=window.THREE;

function profilePoints(){
  // half cross-section of the tire: (radius, axial position)
  const p=[[.655,-.25],[.69,-.29],[.77,-.315],[.86,-.315],[.93,-.3],[.975,-.27],[.995,-.225],[1.0,-.16],[1.0,.16],[.995,.225],[.975,.27],[.93,.3],[.86,.315],[.77,.315],[.69,.29],[.655,.25]];
  const c=new T.SplineCurve(p.map(([x,y])=>new T.Vector2(x,y)));
  return c.getSpacedPoints(180);
}
const PROFILE=profilePoints();
// v-bands from the profile (lathe v runs along these points)
const N=PROFILE.length-1;
let tv0=1,tv1=0;PROFILE.forEach((pt,i)=>{if(pt.x>.988){tv0=Math.min(tv0,i/N);tv1=Math.max(tv1,i/N)}});
let sv0=1,sv1=0;PROFILE.forEach((pt,i)=>{if(pt.y>0&&pt.x>.72&&pt.x<.93){sv0=Math.min(sv0,i/N);sv1=Math.max(sv1,i/N)}});
let bv0=1,bv1=0;PROFILE.forEach((pt,i)=>{if(pt.y<0&&pt.x>.72&&pt.x<.93){bv0=Math.min(bv0,i/N);bv1=Math.max(bv1,i/N)}});

function treadCanvas(season,brand,model,size){
  const W=2048,H=1024,cv=document.createElement("canvas");cv.width=W;cv.height=H;
  const g=cv.getContext("2d");
  const Y=v=>(1-v)*H;
  g.fillStyle="#6c6c6c";g.fillRect(0,0,W,H);                     // sidewall base
  const ty0=Y(tv1),ty1=Y(tv0),th=ty1-ty0;                         // tread band in canvas
  g.fillStyle="#9a9a9a";g.fillRect(0,ty0-6,W,th+12);              // tread blocks (raised)
  g.save();g.beginPath();g.rect(0,ty0-6,W,th+12);g.clip();
  const groove=(x1,y1,x2,y2,w)=>{g.lineWidth=w;g.beginPath();g.moveTo(x1,y1);g.lineTo(x2,y2);g.stroke()};
  g.strokeStyle="#262626";g.lineCap="round";
  const rib=f=>ty0+th*f;
  if(season==="ete"){
    [.22,.42,.58,.78].forEach(f=>{g.fillStyle="#222";g.fillRect(0,rib(f)-7,W,14)});
    for(let x=0;x<W+40;x+=26){groove(x,rib(0)-8,x+16,rib(.2),6);groove(x+8,rib(.8),x-8,rib(1)+8,6)}
    for(let x=0;x<W;x+=52){groove(x,rib(.45),x+10,rib(.55),3)}
  }else if(season==="hiver"){
    [.3,.5,.7].forEach(f=>{g.fillStyle="#222";g.fillRect(0,rib(f)-6,W,12)});
    for(let x=0;x<W+40;x+=34){groove(x,rib(0)-8,x+12,rib(.3),7);groove(x+17,rib(.7),x+5,rib(1)+8,7);groove(x+8,rib(.3),x+20,rib(.5),5);groove(x+26,rib(.5),x+14,rib(.7),5)}
    g.lineWidth=2;g.strokeStyle="#3a3a3a";
    for(let x=0;x<W;x+=11){for(const [a,b] of [[.04,.27],[.33,.47],[.53,.67],[.73,.96]]){g.beginPath();let up=true;for(let y=rib(a);y<=rib(b);y+=7){g.lineTo(x+(up?0:4),y);up=!up}g.stroke()}}
  }else{
    g.fillStyle="#222";g.fillRect(0,rib(.5)-5,W,10);
    for(let x=0;x<W+80;x+=30){groove(x,rib(0)-8,x+30,rib(.48),9);groove(x,rib(1)+8,x+30,rib(.52),9)}
    g.lineWidth=2;g.strokeStyle="#444";
    for(let x=0;x<W+80;x+=15){groove(x+8,rib(.08),x+30,rib(.42),2);groove(x+8,rib(.92),x+30,rib(.58),2)}
  }
  g.restore();
  // shoulders + sidewall details
  g.fillStyle="#555";g.fillRect(0,ty0-14,W,8);g.fillRect(0,ty1+6,W,8);
  // raised letters on the visible sidewall (and back side)
  const writeBand=(v0,v1,txt,small)=>{
    const y0=Y(v1),y1=Y(v0),h=y1-y0;g.save();
    g.fillStyle="#a2a2a2";g.textBaseline="middle";
    g.font=`800 ${Math.round(h*.5)}px Archivo, Arial Black, Arial, sans-serif`;
    g.fillText(txt,40,y0+h*.48);
    g.font=`700 ${Math.round(h*.3)}px Arial, sans-serif`;
    g.fillText(small,W*.55,y0+h*.5);
    g.fillRect(0,y0+h*.92,W,3);g.restore();
  };
  writeBand(sv0,sv1,brand.toUpperCase(),`${model.toUpperCase()}   ${size}`);
  writeBand(bv0,bv1,brand.toUpperCase(),size);
  const tex=new T.CanvasTexture(cv);tex.anisotropy=8;tex.wrapS=T.RepeatWrapping;tex.encoding=T.sRGBEncoding;
  return tex;
}
function tireMesh(season,brand,model,size){
  const geo=new T.LatheGeometry(PROFILE,220);
  const tex=treadCanvas(season,brand,model,size);
  const bump=tex.clone();bump.encoding=T.LinearEncoding;bump.needsUpdate=true;
  const mat=new T.MeshStandardMaterial({color:0x1b1b1c,map:tex,bumpMap:bump,bumpScale:.014,roughness:.72,metalness:0,side:T.DoubleSide,envMapIntensity:.45});
  const m=new T.Mesh(geo,mat);m.castShadow=true;return m;
}
function rimGroup(){
  const g=new T.Group();
  const metal=new T.MeshStandardMaterial({color:0x4a4f56,metalness:1,roughness:.26,envMapIntensity:1.5});
  const edge=new T.MeshStandardMaterial({color:0x9aa0a6,metalness:1,roughness:.22,envMapIntensity:1.4});
  // face with 10 windows (5 double spokes)
  const sh=new T.Shape();sh.absarc(0,0,.645,0,Math.PI*2,false);
  const n=10;
  for(let i=0;i<n;i++){
    const a0=i/n*Math.PI*2+(i%2?.09:.05), a1=(i+1)/n*Math.PI*2-(i%2?.05:.09);
    const h=new T.Path();
    const r0=.2,r1=.57;
    h.moveTo(Math.cos(a0)*r0,Math.sin(a0)*r0);
    h.lineTo(Math.cos(a0)*r1,Math.sin(a0)*r1);
    h.absarc(0,0,r1,a0,a1,false);
    h.lineTo(Math.cos(a1)*r0,Math.sin(a1)*r0);
    h.absarc(0,0,r0,a1,a0,true);
    sh.holes.push(h);
  }
  const face=new T.ExtrudeGeometry(sh,{depth:.05,bevelEnabled:true,bevelThickness:.015,bevelSize:.012,bevelSegments:3,curveSegments:64});
  face.rotateX(-Math.PI/2);
  const fm=new T.Mesh(face,metal);fm.position.y=.15;g.add(fm);
  const lip=new T.Mesh(new T.TorusGeometry(.645,.018,12,128),edge);lip.rotation.x=Math.PI/2;lip.position.y=.215;g.add(lip);
  const barrel=new T.Mesh(new T.CylinderGeometry(.648,.648,.48,96,1,true),new T.MeshStandardMaterial({color:0x101113,metalness:.6,roughness:.5,side:T.DoubleSide}));g.add(barrel);
  const hub=new T.Mesh(new T.CylinderGeometry(.11,.13,.08,48),edge);hub.position.y=.23;g.add(hub);
  const cap=new T.Mesh(new T.CylinderGeometry(.075,.075,.02,48),new T.MeshStandardMaterial({color:new T.Color(0x9c2b3b).convertSRGBToLinear(),metalness:.6,roughness:.35}));cap.position.y=.275;g.add(cap);
  for(let i=0;i<5;i++){const b=new T.Mesh(new T.CylinderGeometry(.018,.018,.06,16),edge);const a=i/5*Math.PI*2;b.position.set(Math.cos(a)*.16,.24,Math.sin(a)*.16);g.add(b)}
  // brake disc + copper caliper behind the spokes
  const disc=new T.Mesh(new T.CylinderGeometry(.5,.5,.04,96),new T.MeshStandardMaterial({color:0x2c2f33,metalness:.9,roughness:.5}));disc.position.y=-.02;g.add(disc);
  const cal=new T.Mesh(new T.BoxGeometry(.22,.12,.34),new T.MeshStandardMaterial({color:new T.Color(0x9c2b3b).convertSRGBToLinear(),metalness:.35,roughness:.4}));cal.position.set(.42,.05,0);cal.userData.static=true;g.add(cal);
  return g;
}
function rimGroup5(){
  const g=new T.Group();
  const metal=new T.MeshStandardMaterial({color:0x2b2e33,metalness:.92,roughness:.3,envMapIntensity:1.5});
  const edge=new T.MeshStandardMaterial({color:0xb9bec5,metalness:1,roughness:.18,envMapIntensity:1.6});
  const sh=new T.Shape();sh.absarc(0,0,.645,0,Math.PI*2,false);
  for(let i=0;i<5;i++){
    const a0=i/5*Math.PI*2+.2,a1=(i+1)/5*Math.PI*2-.2,r0=.2,r1=.585,h=new T.Path();
    h.moveTo(Math.cos(a0+.12)*r0,Math.sin(a0+.12)*r0);h.lineTo(Math.cos(a0)*r1,Math.sin(a0)*r1);
    h.absarc(0,0,r1,a0,a1,false);h.lineTo(Math.cos(a1-.12)*r0,Math.sin(a1-.12)*r0);h.absarc(0,0,r0,a1-.12,a0+.12,true);
    sh.holes.push(h);
  }
  const face=new T.ExtrudeGeometry(sh,{depth:.07,bevelEnabled:true,bevelThickness:.02,bevelSize:.016,bevelSegments:4,curveSegments:72});
  face.rotateX(-Math.PI/2);const fm=new T.Mesh(face,metal);fm.position.y=.13;g.add(fm);
  const lip=new T.Mesh(new T.TorusGeometry(.648,.02,14,160),edge);lip.rotation.x=Math.PI/2;lip.position.y=.215;g.add(lip);
  const barrel=new T.Mesh(new T.CylinderGeometry(.648,.648,.48,96,1,true),new T.MeshStandardMaterial({color:0x0c0d0f,metalness:.6,roughness:.5,side:T.DoubleSide}));g.add(barrel);
  const hub=new T.Mesh(new T.CylinderGeometry(.12,.14,.1,48),metal);hub.position.y=.24;g.add(hub);
  const cap=new T.Mesh(new T.CylinderGeometry(.08,.08,.02,48),edge);cap.position.y=.295;g.add(cap);
  const dot=new T.Mesh(new T.CylinderGeometry(.03,.03,.022,32),new T.MeshStandardMaterial({color:new T.Color(0x9c2b3b).convertSRGBToLinear(),metalness:.5,roughness:.35}));dot.position.y=.3;g.add(dot);
  const disc=new T.Mesh(new T.CylinderGeometry(.5,.5,.04,96),new T.MeshStandardMaterial({color:0x2c2f33,metalness:.9,roughness:.5}));disc.position.y=-.02;g.add(disc);
  const cal=new T.Mesh(new T.BoxGeometry(.22,.12,.34),new T.MeshStandardMaterial({color:new T.Color(0x9c2b3b).convertSRGBToLinear(),metalness:.35,roughness:.4}));cal.position.set(.42,.05,0);cal.userData.static=true;g.add(cal);
  return g;
}
function studioEnv(renderer){
  const s=new T.Scene();
  s.add(new T.Mesh(new T.BoxGeometry(20,20,20),new T.MeshBasicMaterial({color:0x050506,side:T.BackSide})));
  const box=(w,h,x,y,z,ry,c)=>{const m=new T.Mesh(new T.PlaneGeometry(w,h),new T.MeshBasicMaterial({color:c,side:T.DoubleSide}));m.position.set(x,y,z);m.lookAt(0,0,0);s.add(m)};
  box(6,2,-6,5,4,0,0xffffff);box(3,8,7,2,2,0,0xd9dde2);box(10,1,0,9,-3,0,0x8a8f96);box(4,1.2,2,-1,8,0,0xffffff);
  const pm=new T.PMREMGenerator(renderer);const rt=pm.fromScene(s,.02);pm.dispose();return rt.texture;
}
function lights(scene){
  scene.add(new T.HemisphereLight(0x8c96a3,0x0a0a0a,.35));
  const key=new T.SpotLight(0xffffff,2.2,30,.5,.6,1.2);key.position.set(-4,6,5);key.castShadow=true;key.shadow.mapSize.set(1024,1024);key.shadow.bias=-.0004;scene.add(key);
  const rim=new T.DirectionalLight(0xffe2e6,.9);rim.position.set(5,2,-4);scene.add(rim);
  const fill=new T.DirectionalLight(0xbfc8d4,.35);fill.position.set(4,1,6);scene.add(fill);
}

/* ---- thumbnails for every tire in stock (rendered once) ---- */
try{
  const tr=new T.WebGLRenderer({antialias:true,alpha:true,preserveDrawingBuffer:true});
  tr.setPixelRatio(1);tr.setSize(640,512);tr.outputEncoding=T.sRGBEncoding;tr.toneMapping=T.ACESFilmicToneMapping;tr.toneMappingExposure=1.05;tr.shadowMap.enabled=true;
  const sc=new T.Scene();sc.environment=studioEnv(tr);lights(sc);
  const cam=new T.PerspectiveCamera(30,640/512,.1,50);cam.position.set(0,1.15,5.2);cam.lookAt(0,.98,0);
  const sc2=document.createElement("canvas");sc2.width=sc2.height=256;const sg=sc2.getContext("2d");const sgr=sg.createRadialGradient(128,128,10,128,128,128);sgr.addColorStop(0,"rgba(0,0,0,.85)");sgr.addColorStop(1,"rgba(0,0,0,0)");sg.fillStyle=sgr;sg.fillRect(0,0,256,256);
  const floor=new T.Mesh(new T.PlaneGeometry(2.9,1.3),new T.MeshBasicMaterial({map:new T.CanvasTexture(sc2),transparent:true,depthWrite:false}));floor.rotation.x=-Math.PI/2;floor.rotation.z=.62;floor.position.y=.002;sc.add(floor);tr.shadowMap.enabled=false;
  for(const t of TIRES){
    const holder=new T.Group();const axle=new T.Group();axle.rotation.x=Math.PI/2;holder.add(axle);
    const m=tireMesh(t.season,t.brand,t.model,sizeOf(t));axle.add(m);m.rotation.y=Math.random()*6;
    holder.position.y=1.0;holder.rotation.y=-.62;sc.add(holder);
    tr.render(sc,cam);IMG[t.id]=tr.domElement.toDataURL("image/webp",.86);
    sc.remove(holder);m.geometry.dispose();m.material.map.dispose();m.material.bumpMap.dispose();m.material.dispose();
  }
  tr.dispose();
  document.querySelectorAll("img[data-img]").forEach(i=>{i.src=IMG[i.dataset.img]});
}catch(err){console.warn("thumbs",err)}

/* ---- hero A+: the real photo's rim spins (perspective-correct warp around the hub) ---- */
try{
  if(window.THREE){
    const T=window.THREE,img=$("#heroPhoto"),cv=$("#spinCanvas");if(!cv)throw 0;const stage=$("#stage"),wrap=cv.parentElement;
    const reduce=matchMedia("(prefers-reduced-motion: reduce)").matches;
    const go=()=>{
      const r=new T.WebGLRenderer({canvas:cv,antialias:true,alpha:true,premultipliedAlpha:false});
      r.setPixelRatio(Math.min(2,devicePixelRatio||1));
      const tex=new T.Texture(img);tex.needsUpdate=true;tex.encoding=T.sRGBEncoding;tex.minFilter=T.LinearFilter;tex.generateMipmaps=false;
      r.outputEncoding=T.sRGBEncoding;
      const W=img.naturalWidth,H=img.naturalHeight,k=W/1200;
      const ang=177.15*Math.PI/180;
      const mat=new T.ShaderMaterial({uniforms:{map:{value:tex},size:{value:new T.Vector2(W,H)},hub:{value:new T.Vector2(715*k,735*k)},lip:{value:new T.Vector2(767*k,748*k)},ax:{value:new T.Vector2(238*k,453*k)},phi:{value:0.0},theta:{value:0}},
        vertexShader:"varying vec2 vUv;void main(){vUv=uv;gl_Position=vec4(position.xy,0.,1.);}",
        fragmentShader:`uniform sampler2D map;uniform vec2 size,hub,lip,ax;uniform float phi,theta;varying vec2 vUv;
        mat2 rot(float a){float c=cos(a),s=sin(a);return mat2(c,s,-s,c);}
        void main(){
          vec2 p=vec2(vUv.x,1.-vUv.y)*size;
          mat2 R=rot(phi);mat2 Ri=rot(-phi);
          vec2 d=lip-hub;
          vec2 q=(Ri*(p-hub))/ax; vec2 e=(Ri*d)/ax;
          float A=dot(e,e)-1.,B=-2.*dot(q,e),C=dot(q,q);
          float disc=max(B*B-4.*A*C,0.);
          float rr=(-B-sqrt(disc))/(2.*A);
          vec4 base=texture2D(map,vUv);
          if(rr<=0.0001||rr>1.0){gl_FragColor=base;return;}
          vec2 u=q/rr-e;
          vec2 u2=rot(-theta)*u;
          vec2 ps=hub+rr*(d+R*(u2*ax));
          vec4 spun=texture2D(map,vec2(ps.x/size.x,1.-ps.y/size.y));
          // the red brake caliper stays still: hide it in the spinning layer, show it through the gaps
          float redS=step(.16,spun.r-max(spun.g,spun.b))*step(rr,.8);
          spun.rgb=mix(spun.rgb,vec3(.025),redS);
          float redB=step(.16,base.r-max(base.g,base.b))*step(rr,.8);
          float gap=1.-smoothstep(.05,.12,dot(spun.rgb,vec3(.33)));
          spun.rgb=mix(spun.rgb,base.rgb,redB*gap);
          float m=1.-smoothstep(.955,.985,rr);
          gl_FragColor=mix(base,spun,m);
        }`});
      const scene=new T.Scene(),cam=new T.Camera();scene.add(new T.Mesh(new T.PlaneGeometry(2,2),mat));
      function fit(){const w=wrap.clientWidth,h=wrap.clientHeight;r.setSize(w,h,false)}
      fit();addEventListener("resize",fit);wrap.classList.add("spin-on");
      let th=0,last=performance.now(),t0=last,vis=true,boost=0,lastY=scrollY;
      new IntersectionObserver(es=>{vis=es[0].isIntersecting}).observe(stage);
      addEventListener("scroll",()=>{boost+=Math.min(.8,Math.abs(scrollY-lastY)*.006);lastY=scrollY},{passive:true});
      (function loop(now){const dt=Math.min(.05,(now-last)/1000);last=now;
        if(vis){const t=(now-t0)/1000,spd=reduce?0:(.55+boost+Math.max(0,7*(1-t/1.8)));boost*=.92;th+=dt*spd;mat.uniforms.theta.value=th;r.render(scene,cam)}
        requestAnimationFrame(loop)})(last);
    };
    /* rim spin disabled: the tire layer sways instead */
  }
}catch(err){}

/* ---- hero B: 3D wheel (kept, not used) ---- */
function startHero3D(){try{
  const cv=$("#hero3d"),stage=$("#stage");$("#fallback")&&($("#fallback").hidden=true);
  const r=new T.WebGLRenderer({canvas:cv,antialias:true,alpha:true});
  r.setPixelRatio(Math.min(2,devicePixelRatio||1));r.outputEncoding=T.sRGBEncoding;r.toneMapping=T.ACESFilmicToneMapping;r.toneMappingExposure=1.1;r.shadowMap.enabled=true;r.shadowMap.type=T.PCFSoftShadowMap;
  const scene=new T.Scene();scene.environment=studioEnv(r);lights(scene);
  const top=new T.SpotLight(0xffffff,2.6,20,.42,.75,1.4);top.position.set(0,7.5,1.2);top.target.position.set(0,.9,0);top.castShadow=true;top.shadow.mapSize.set(1024,1024);top.shadow.bias=-.0004;scene.add(top,top.target);
  const cam=new T.PerspectiveCamera(28,1,.1,60);cam.position.set(0,1.75,8.2);cam.lookAt(0,.78,0);

  // pedestal: dark body, chrome bevel, LED ring, glass top
  const dark=new T.MeshStandardMaterial({color:0x0b0c0e,metalness:.55,roughness:.32,side:T.DoubleSide});
  const body=new T.Mesh(new T.CylinderGeometry(1.5,1.5,.62,128,1,true),dark);body.position.y=-.31;body.receiveShadow=true;scene.add(body);
  const plinth=new T.Mesh(new T.CylinderGeometry(1.66,1.7,.08,128),new T.MeshStandardMaterial({color:0x0e0f11,metalness:.6,roughness:.3}));plinth.position.y=-.66;scene.add(plinth);
  const chrome=new T.MeshStandardMaterial({color:0xd4d8dd,metalness:1,roughness:.16,envMapIntensity:1.6});
  const bevel=new T.Mesh(new T.TorusGeometry(1.5,.028,16,192),chrome);bevel.rotation.x=Math.PI/2;scene.add(bevel);
  const led=new T.Mesh(new T.TorusGeometry(1.5,.012,10,192),new T.MeshBasicMaterial({color:0xffffff}));led.rotation.x=Math.PI/2;led.position.y=-.6;scene.add(led);
  const glass=new T.Mesh(new T.CircleGeometry(1.49,128),new T.MeshStandardMaterial({color:0x060607,metalness:.7,roughness:.07,transparent:true,opacity:.8,envMapIntensity:1.4}));glass.rotation.x=-Math.PI/2;glass.position.y=.001;glass.receiveShadow=true;scene.add(glass);
  const shade=new T.Mesh(new T.CircleGeometry(1.48,128),new T.ShadowMaterial({opacity:.55}));shade.rotation.x=-Math.PI/2;shade.position.y=.004;shade.receiveShadow=true;scene.add(shade);
  // floor + glow under the plinth
  const gc=document.createElement("canvas");gc.width=gc.height=256;const gg=gc.getContext("2d");
  const grd=gg.createRadialGradient(128,128,60,128,128,128);grd.addColorStop(0,"rgba(255,255,255,0)");grd.addColorStop(.66,"rgba(255,255,255,.42)");grd.addColorStop(.74,"rgba(255,255,255,.14)");grd.addColorStop(1,"rgba(255,255,255,0)");
  gg.fillStyle=grd;gg.fillRect(0,0,256,256);
  const glow=new T.Mesh(new T.PlaneGeometry(4.6,4.6),new T.MeshBasicMaterial({map:new T.CanvasTexture(gc),transparent:true,blending:T.AdditiveBlending,depthWrite:false,opacity:.9}));glow.rotation.x=-Math.PI/2;glow.position.y=-.7;scene.add(glow);

  // wheel + mirrored reflection inside the glass
  function wheel(){
    const holder=new T.Group(),axle=new T.Group(),spin=new T.Group();
    axle.rotation.x=Math.PI/2;holder.add(axle);axle.add(spin);
    spin.add(tireMesh("hiver","Daytona","Pneus contrôlés · Genève","235/55 R18"));
    const rim=rimGroup5();spin.add(rim);
    const cal=rim.children.find(c=>c.userData.static);rim.remove(cal);axle.add(cal);
    return {holder,axle,spin};
  }
  const sc3=document.createElement("canvas");sc3.width=sc3.height=256;const s3=sc3.getContext("2d");const g3=s3.createRadialGradient(128,128,70,128,128,126);g3.addColorStop(0,"rgba(15,23,42,.22)");g3.addColorStop(1,"rgba(15,23,42,0)");s3.fillStyle=g3;s3.fillRect(0,0,256,256);
  const floorShadow=new T.Mesh(new T.PlaneGeometry(4.1,2.6),new T.MeshBasicMaterial({map:new T.CanvasTexture(sc3),transparent:true,depthWrite:false,toneMapped:false}));floorShadow.rotation.x=-Math.PI/2;floorShadow.position.y=-.71;floorShadow.visible=false;
  const W=wheel(),R=wheel();
  W.holder.position.y=1.0;W.holder.rotation.y=-.55;scene.add(W.holder);
  R.holder.scale.y=-1;R.holder.position.y=-1.0;R.holder.rotation.y=-.55;scene.add(R.holder);
  r.localClippingEnabled=true;const clipP=[new T.Plane(new T.Vector3(0,1,0),.6)];
  R.holder.traverse(o=>{if(o.material){o.material=o.material.clone();o.material.side=T.DoubleSide;o.material.clippingPlanes=clipP}});
  W.holder.traverse(o=>{if(o.isMesh)o.castShadow=true});

  // callout anchors (fixed to the axle, they don't spin)
  const anchors={tread:new T.Vector3(.72,0,-.72),side:new T.Vector3(-.66,.3,.38),hub:new T.Vector3(0,.29,0)};
  const anchorObj={};for(const k in anchors){const o=new T.Object3D();o.position.copy(anchors[k]);W.axle.add(o);anchorObj[k]=o}
  const cos=[...document.querySelectorAll("#callouts3d .co")];

  function size(){const w=stage.clientWidth,h=stage.clientHeight;r.setSize(w,h,false);cam.aspect=w/h;cam.updateProjectionMatrix()}
  size();addEventListener("resize",size);

  const reduce=matchMedia("(prefers-reduced-motion: reduce)").matches;
  const t0=performance.now();
  let last=t0,boost=0,lastY=scrollY,visible=true,shown=false;
  new IntersectionObserver(es=>{visible=es[0].isIntersecting}).observe(stage);
  addEventListener("scroll",()=>{boost+=Math.min(.6,Math.abs(scrollY-lastY)*.004);lastY=scrollY},{passive:true});
  let px=0;stage.addEventListener("pointermove",e=>{const b=stage.getBoundingClientRect();px=((e.clientX-b.left)/b.width-.5)});
  stage.addEventListener("pointerleave",()=>px=0);
  const v=new T.Vector3(),ease=t=>1-Math.pow(1-t,3);
  function frame(now){
    const dt=Math.min(.05,(now-last)/1000);last=now;
    if(visible){
      const k=reduce?1:Math.min(1,(now-t0)/1600),e=ease(k);
      W.holder.position.y=1.0+.55*(1-e);R.holder.position.y=-W.holder.position.y;
      if(!reduce){
        const sp=(.32+boost)+(1-e)*5;
        W.spin.rotation.y-=dt*sp;boost*=.92;
        const ry=W.holder.rotation.y+((-.55+px*.45)-W.holder.rotation.y)*.05;W.holder.rotation.y=ry;R.holder.rotation.y=ry;
      }
      R.spin.rotation.y=W.spin.rotation.y;
      glow.material.opacity=.75+e*.2;led.material.color.setScalar(.88+Math.sin(now/900)*.06);
      r.render(scene,cam);
      // callouts
      const w=stage.clientWidth,h=stage.clientHeight;
      cos.forEach(c=>{const o=anchorObj[c.dataset.a];v.setFromMatrixPosition(o.matrixWorld).project(cam);c.style.transform=`translate(${(v.x+1)/2*w}px,${(1-v.y)/2*h}px)`});
      if(!shown&&k>=1){shown=true;cos.forEach((c,i)=>setTimeout(()=>c.classList.add("on"),i*220))}
    }
    requestAnimationFrame(frame);
  }
  requestAnimationFrame(frame);
}catch(err){console.warn("hero",err)}}

})();
