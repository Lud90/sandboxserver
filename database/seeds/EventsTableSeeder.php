<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first = DB::table('events')->insertGetId([
            'title' => 'A new event',
            'image' => '/images/sample1.jpg',
            'content' => 'Weight has nothing to do with it. Precisely. I do understand. If I know too much about my own future I could endanger my own existence, just as you endangered yours. He\'s fine, and he\'s completely unaware that anything happened. As far as he\'s concerned the trip was instantaneous. That\'s why Einstein\'s watch is exactly one minute behind mine. He skipped over that minute to instantly arrive at this moment in time. Come here, I\'ll show you how it works. First, you turn the time circuits on. This readout tell you where you\'re going, this one tells you where you are, this one tells you where you were. You imput the destination time on this keypad. Say, you wanna see the signing of the declaration of independence, or witness the birth or Christ. Here\'s a red-letter date in the history of science, November 5, 1955. Yes, of course, November 5, 1955. Yeah, he\'s right here. Unfortunately no, it requires something with a little more kick, plutonium. You bet. He\'s fine, and he\'s completely unaware that anything happened. As far as he\'s concerned the trip was instantaneous. That\'s why Einstein\'s watch is exactly one minute behind mine. He skipped over that minute to instantly arrive at this moment in time. Come here, I\'ll show you how it works. First, you turn the time circuits on. This readout tell you where you\'re going, this one tells you where you are, this one tells you where you were. You imput the destination time on this keypad. Say, you wanna see the signing of the declaration of independence, or witness the birth or Christ. Here\'s a red-letter date in the history of science, November 5, 1955. Yes, of course, November 5, 1955. You bet. Are you sure about this storm?
                So tell me, future boy, who\'s president of the United States in 1985? Oh, hi , Marty. I didn\'t hear you come in. Fascinating device, this video unit. It\'s about the future, isn\'t it? Bear with me, Marty, all of your questions will be answered. Roll tape, we\'ll proceed. Unfortunately no, it requires something with a little more kick, plutonium. Watch this. Not me, the car, the car. My calculations are correct, when this baby hits eighty-eight miles per hour, your gonna see some serious shit. Watch this, watch this. Ha, what did I tell you, eighty-eight miles per hour. The temporal displacement occurred at exactly 1:20 a.m. and zero seconds. One point twenty-one gigawatts. One point twenty-one gigawatts. Great Scott. Is she pretty? Marty you gotta come back with me. Marty, you made it.',
            'cost' => 'Free',
            'url' => 'http://deloreanipsum.com',
            'start_time' => '2016-03-17 12:00:00',
            'end_time' => '2016-03-18 20:00:00',
        ]);

        $second = DB::table('events')->insertGetId([
            'title' => 'Hackathon',
            'image' => '/images/sample2.jpg',
            'content' => 'Haxx0r ipsum exception irc else tarball throw warez d00dz long emacs fail rm -rf. Infinite loop packet sniffer win mutex Leslie Lamport fatal Starcraft frack January 1, 1970. Gc Trojan horse cat back door hash port printf gurfle malloc client. Cookie headers tunnel in try catch Starcraft gobble mailbomb sql bar cd cat float ack while regex leet bypass case. Double irc interpreter port crack function I\'m sorry Dave, I\'m afraid I can\'t do that wombat less. Concurrently afk break stack hack the mainframe pragma new.
                Stack trace segfault Starcraft strlen rm -rf long function tarball protocol cache default foad sql. Gc data snarf suitably small values ctl-c var for foo wabbit hexadecimal client gc cat socket. Warez loop private ssh firewall endif daemon worm ban ddos gcc char mountain dew semaphore hash nak leapfrog terminal buffer leet else try catch.',
            'cost' => '$5.00 entry',
            'url' => 'http://hackeripsum.com',
            'start_time' => '2016-02-20 14:00:00',
            'end_time' => '2016-02-20 16:00:00'

        ]);

        DB::table('event_sandbox')->insert([
           'event_id' => $first,
            'sandbox_id' => 1
        ]);

        DB::table('event_sandbox')->insert([
           'event_id' => $second,
            'sandbox_id' => 2
        ]);

    }
}
