import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Task } from './task.entity';
// import { createTaskDto } from './dto/create-task.dto';

@Injectable()
export class TasksService {
  constructor(
    @InjectRepository(Task)
    private tasksRepo: Repository<Task>,
  ) {}

  createTask(taskData: Partial<Task>) {
    const task = this.tasksRepo.create(taskData);
    return this.tasksRepo.save(task);
  }

  findAll() {
    return this.tasksRepo.find({ relations: ['user'] });
  }

  async getTask(id: number) {
    const task = await this.tasksRepo.findOne({ where: { id }, relations: ['user'] });
    if (!task){
      throw new NotFoundException(`Task with id ${id} not found`);
    }
    return task;
  }

  async updateTask(id: number, updateData: Partial<Task>) {
    await this.tasksRepo.update(id, updateData);
    return this.getTask(id);
  }

  deleteTask(id: number) {
    return this.tasksRepo.delete(id);
  }

  async markDone(id: number) {
    await this.tasksRepo.update(id, { completedAt: new Date().toISOString() });
  }

  async markPending(id: number) {
    await this.tasksRepo.update(id, { completedAt: null });
  }

  async deleteAll() {
    await this.tasksRepo.clear();
  }
}