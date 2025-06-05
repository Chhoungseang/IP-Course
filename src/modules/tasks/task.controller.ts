import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  ParseIntPipe,
  Patch,
  Post,
  UsePipes,
  ValidationPipe,
} from '@nestjs/common';
import { TasksService } from './task.service';
import { Task } from './task.entity';
import { CreateTaskDto } from './dto/create-task.dto';

@Controller('tasks')
export class TasksController {
  constructor(private readonly taskService: TasksService) {}

  @Get()
  getAllTask(){
    return this.taskService.findAll();
  }

  @Get('/:id')
  getById(@Param('id') id:number){
    return this.taskService.getTask(id);
  }

  @Post('/')
  @UsePipes(new ValidationPipe({ whitelist: true }))
  create(@Body() createTaskDto: CreateTaskDto) {
    return this.taskService.createTask(createTaskDto);
  }

  @Patch('/:id')
  updateTask(
    @Body() body: Partial <Task>,
    @Param('id', ParseIntPipe) id:number
  ) {
    return this.taskService.updateTask(id, body);
  }

  @Delete('/:id')
  deleteTask(@Param('id', ParseIntPipe) id:number) {
    return this.taskService.deleteTask(id);
  }

  @Delete('/')
  RemoveAll(){
    return this.taskService.deleteAll();
  }

  @Patch('/:id/done')
  markTaskAsDone(@Param('id') id: number) {
    return this.taskService.markDone(id);
  }

  @Patch('/:id/pending')
  markTaskAsPending(@Param('id') id: number) {
    return this.taskService.markPending(id);
  }
}
