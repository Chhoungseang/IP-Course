import {
  Get,
  Param,
  Controller,
  Post,
  Body,
  Patch,
  Delete,
  ParseIntPipe,
} from '@nestjs/common';
import { UsersService } from './user.service';
import { createUserDto } from './dto/create-user.dto';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UsersService) {}

  // @Get('/:username')
  // getUser(@Param('username') username: string) {
  //   return this.userService.(username);
  // }

  @Get()
  getAllUser(){
    return this.userService.findAll();
  }

  @Get('/:id')
  getById(id:number){
    return this.userService.getUser(id);
  }

  @Post('/')
  createUser(@Body() body: createUserDto) {
    return this.userService.createUser(body);
  }

  @Patch('/:id')
  updateUser(
    @Body() body: { username: string; email: string; password: string },
    @Param('id', ParseIntPipe) id:number
  ) {
    return this.userService.updateUser(id, body);
  }

  @Delete('/:id')
  deleteUser(@Param('id', ParseIntPipe) id:number) {
    return this.userService.deleteUser(id);
  }
}
