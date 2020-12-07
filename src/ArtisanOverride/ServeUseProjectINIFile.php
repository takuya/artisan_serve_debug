<?php
/**
 *
 * User: takuya
 * Date: 2020/12/07
 *
 *
 *
 *  Copyright (C) 2017  takuya_1st
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */


namespace takuya\ArtisanOverride;

use Illuminate\Foundation\Console\ServeCommand;

class ServeUseProjectINIFile extends ServeCommand {
  
  // 注意！ $signature じゃなくて、$name
  protected $name = 'serve:use_ini';
  
  protected $description = 'artisan serve with debug';
  
  /**
   * Add Environment Variable PHP_INI_SCAN_DIR to ServeCommand::serverCommand.
   */
  protected function serverCommand () {
    $ini_scan_dir = base_path();
    $addtional_env = " PHP_INI_SCAN_DIR=:$ini_scan_dir  ";
    $cmd = parent::serverCommand();
    $cmd = $addtional_env.$cmd;
    
    return $cmd;
  }
  
}
