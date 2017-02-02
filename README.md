# String to Mix
###설명
2개 이상의 배열을 받아 서로 섞어줍니다.

***

###주의사항

1.반드시 2개 이상의 값을 받아야하며 리턴값은 문자열 입니다.

2.두배열의 길이가 1글자 이상이여야합니다.

3.인자는 배열로 받아야합니다.

***

###해쉬를 통한 사용예

일반 md5(md5("password"))의 경우 rainbow table에 의해 값을 유추해낼 수 있지만 string2mix()후 해쉬화 하면 값을 유추해내기 어렵습니다.

해당값을 해쉬화 할경우 

1. <code>["hello","world"] => "hweolrllod"</code>
2. <code>["HTML5","PHP7","CSS3","SCSS","jQuery","ANIA"] => "HPCSjATHSCQNMuLPSSeI5r73SyA"</code>
3. <code>["비밀번호","안알랴줌"] => "비안밀알번랴호줌"</code>

**예제의 make_hash()에 password / 패스워드를 넣은 예제**

1. <code>["11297115115119111114100","21179511511911111411001"] => "1211219779151151151151191191111111141141100001"

=> **(HASH)** d43edf43367739eb6ad5b0e7b0142ac52087ad2df5b625aacd26de8f661e070c7313d4e02ef4ae4625ba2a696f4d8871b9e7d3d270ec8f8d3797d605b2603e10</code>

2. <code>["237236236235","732632632532"] => "273372263362263362253352"

=> **(HASH)** 85c9f770936c2020e3ae2f3503b673f99de6f757c40594d3908a563ebb0b8b4dde197d07a6590915db644e1f37086627cd50ea34267d31a1e157bdca9f982e10</code>


**예제의 simple_hash**

1. <code>["696d29e0940a4957748fe3fc9efd22a3","99fc288bed7238d16d567aa5b3ccd4f5"] => "69996fdc2298e80b9e4d07a243985d71764d85f6e73afac59be3fcdc2d24af35" 

=> **(HASH)** "090e1e2cc7ee7e31bfd1428ffd323a1f"</code>

![Alt text](https://raw.githubusercontent.com/k22pr/PHPx-String2Mix/master/rainbow/test1.png "md5(md5($pass))")
![Alt text](https://raw.githubusercontent.com/k22pr/PHPx-String2Mix/master/rainbow/test2.png "simple_hash($pass))")

***

그냥 오밤중에 심심해서 만들었습니다...

make_hash() 함수는 그냥 테스트용 응용예제입니다. 해당 해쉬가 실제로 얼마나 안전한지는 모르겠습니다.
