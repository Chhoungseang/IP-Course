import { Injectable, Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UserModule } from './modules/users/user.module';
import { TaskModule } from './modules/tasks/task.module';
import { User } from './modules/users/user.entity';
import { Task } from './modules/tasks/task.entity';

@Injectable()
export class AppService {
  getHello(): string {
    return 'Bye World!';
  }
}