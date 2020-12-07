<?php
/**
 *
 * User: takuya
 * Date: 2020/12/07
 *
 *
 *
 * 	Copyright (C) 2017  takuya_1st
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
 
 */


namespace takuya\ArtisanOverride;

use Illuminate\Foundation\Console\ServeCommand;


class ServeDebug extends ServeCommand {
  
  // 注意！ $signature じゃなくて、$name
  protected $name = 'serve:debug';
  
  protected $description = 'artisan serve with debug';
  
  protected function serverCommand () {
    $opts = $this->xdebug_options();
    $cmd = parent::serverCommand();
    // command option rearrangement.
    $php = array_shift( $cmd );
    $cmd = collect( [$php, $opts, $cmd] )->flatten()->toArray();
    //
    return $cmd;
  }
  
  protected function xdebug_options () {
    $xdebug_opts = [
      "xdebug.remote_autostart" => "1",
      "xdebug.remote_enable" => "1",
      "xdebug.remote_host" => "127.0.0.1",
      "xdebug.remote_port" => "9000",
      "xdebug.remote_connect_back" => "1",
      "xdebug.remote_log" => "/tmp/xdebug.log",
    ];
    return collect( $xdebug_opts )->map( function( $v, $k ) { return "-d{$k}={$v}"; } )->values();
  }
}
