<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first = DB::table('news')->insertGetId([
            'title' => 'Sample Article',
            'author' => 'Average Joe',
            'image' => '/images/sample3.jpg',
            'content' => 'Bacon ipsum dolor amet dolor pork loin flank enim, qui sirloin drumstick. Meatball exercitation leberkas tempor, magna mollit fatback minim turducken eiusmod. Turkey jowl prosciutto, boudin kevin anim pariatur magna salami dolore sausage ullamco. Ut alcatra cupim nisi prosciutto meatloaf dolore hamburger adipisicing et ut sunt magna commodo non. Mollit dolor fatback in pork chop irure. Aliqua corned beef in, ham hock do duis tri-tip culpa sirloin.',
            'url' => 'http://shiftkeylabs.ca',
            'publish_at' => '2016-02-17 12:51:21',
        ]);

        $second = DB::table('news')->insertGetId([
            'title' => 'Another Article',
            'author' => 'John Doe',
            'image' => '/images/sample4.jpg',
            'content' => 'I\'m surprised you had the courage to take the responsibility yourself. Your eyes can deceive you. Don\'t trust them. The Force is strong with this one. I have you now. Dantooine. They\'re on Dantooine. Hokey religions and ancient weapons are no match for a good blaster at your side, kid. Your eyes can deceive you. Don\'t trust them. I need your help, Luke. She needs your help. I\'m getting too old for this sort of thing. Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you\'re going. Still, she\'s got a lot of spirit. I don\'t know, what do you think? The Force is strong with this one. I have you now. I need your help, Luke. She needs your help. I\'m getting too old for this sort of thing. She must have hidden the plans in the escape pod. Send a detachment down to retrieve them, and see to it personally, Commander. There\'ll be no one to stop us this time! Remember, a Jedi can feel the Force flowing through him. In my experience, there is no such thing as luck. I want to come with you to Alderaan. There\'s nothing for me here now. I want to learn the ways of the Force and be a Jedi, like my father before me. Partially, but it also obeys your commands. You mean it controls your actions? He is here. I care. So, what do you think of her, Han? Look, I ain\'t in this for your revolution, and I\'m not in it for you, Princess. I expect to be well paid. I\'m in it for the money. Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you\'re going. But with the blast shield down, I can\'t even see! How am I supposed to fight? I don\'t know what you\'re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- The Force is strong with this one. I have you now. Don\'t underestimate the Force. Leave that to me. Send a distress signal, and inform the Senate that all on board were killed. I\'m trying not to, kid. Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you\'re going. What!? Alderaan? I\'m not going to Alderaan. I\'ve got to go home. It\'s late, I\'m in for it as it is. Don\'t act so surprised, Your Highness. You weren\'t on any mercy mission this time. Several transmissions were beamed to this ship by Rebel spies. I want to know what happened to the plans they sent you. Red Five standing by. You mean it controls your actions? Oh God, my uncle. How am I ever gonna explain this? What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. I can\'t get involved! I\'ve got work to do! It\'s not that I like the Empire, I hate it, but there\'s nothing I can do about it right now. It\'s such a long way from here. Kid, I\'ve flown from one side of this galaxy to the other. I\'ve seen a lot of strange stuff, but I\'ve never seen anything to make me believe there\'s one all-powerful Force controlling everything. There\'s no mystical energy field that controls my destiny. It\'s all a lot of simple tricks and nonsense. I call it luck. Don\'t underestimate the Force. Hey, Luke! May the Force be with you. I care. So, what do you think of her, Han?
                No! Alderaan is peaceful. We have no weapons. You can\'t possibly… Escape is not his plan. I must face him, alone. Hey, Luke! May the Force be with you. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. He is here. In my experience, there is no such thing as luck. I\'m surprised you had the courage to take the responsibility yourself. Escape is not his plan. I must face him, alone. Kid, I\'ve flown from one side of this galaxy to the other. I\'ve seen a lot of strange stuff, but I\'ve never seen anything to make me believe there\'s one all-powerful Force controlling everything. There\'s no mystical energy field that controls my destiny. It\'s all a lot of simple tricks and nonsense. In my experience, there is no such thing as luck. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. The Force is strong with this one. I have you now. Obi-Wan is here. The Force is with him. Your eyes can deceive you. Don\'t trust them. You don\'t believe in the Force, do you? I can\'t get involved! I\'ve got work to do! It\'s not that I like the Empire, I hate it, but there\'s nothing I can do about it right now. It\'s such a long way from here. Dantooine. They\'re on Dantooine. Red Five standing by. You mean it controls your actions? No! Alderaan is peaceful. We have no weapons. You can\'t possibly… The more you tighten your grip, Tarkin, the more star systems will slip through your fingers. I have traced the Rebel spies to her. Now she is my only link to finding their secret base. I don\'t know what you\'re talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- I can\'t get involved! I\'ve got work to do! It\'s not that I like the Empire, I hate it, but there\'s nothing I can do about it right now. It\'s such a long way from here. I have traced the Rebel spies to her. Now she is my only link to finding their secret base. But with the blast shield down, I can\'t even see! How am I supposed to fight? Don\'t underestimate the Force. The plans you refer to will soon be back in our hands. Ye-ha! Oh God, my uncle. How am I ever gonna explain this?',
            'url' => 'http://hstarwars.com',
            'publish_at' => '2016-02-17 12:51:21'
        ]);

        DB::table('news_sandbox')->insert([
            'news_id' => $first,
            'sandbox_id' => 1
        ]);

        DB::table('news_sandbox')->insert([
            'news_id' => $second,
            'sandbox_id' => 2
        ]);
    }
}
