import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { User } from './user.entity';
import { Repository } from 'typeorm';

@Injectable()
export class UsersService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  createUser(userData: Partial<User>) {
    const user = this.usersRepo.create(userData);
    return this.usersRepo.save(user);
  }

  findAll() {
    return this.usersRepo.find({ relations: ['tasks'] });
  }

  async getUser(id: number) {
    const user = await this.usersRepo.findOne({ where: { id }, relations: ['tasks'] })
    if(!user) {
      throw new NotFoundException(`User with id ${id} not found`);
    }
    return user;
  }

  async updateUser(id: number, updateData: Partial<User>) {
    await this.usersRepo.update(id, updateData);
    return this.getUser(id);
  }

  deleteUser(id: number) {
    return this.usersRepo.delete(id);
  }
}
